<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page";
    }

    public function login() {

        // Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

        // Render template
        if (!$_POST) {
            echo $this->template;
            return;
        
        } else {
            // Sanitize the user entered data to prevent SQL Injection Attacks
            $_POST = DB::instance(DB_NAME)->sanitize($_POST);

            // Hash submitted password so we can compare it against one in the db
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

            // Search the db for this email and password
            // Retrieve the token if it's available
            $q = "SELECT token 
                FROM users 
                WHERE email = '".$_POST['email']."' 
                AND password = '".$_POST['password']."'";

            $token = DB::instance(DB_NAME)->select_field($q);

            // If we didn't find a matching token in the database, it means login failed
            if(!$token) {
                // send an error back 
                $this->template->content->error = '<p>This username &amp; password combination was not found.</p>';
                echo $this->template;

            // But if we did, login succeeded! 
            } else {

                /* 
                Store this token in a cookie using setcookie()
                Important Note: *Nothing* else can echo to the page before setcookie is called
                Not even one single white space.
                param 1 = name of the cookie
                param 2 = the value of the cookie
                param 3 = when to expire
                param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
                */
                setcookie("token", $token, strtotime('+1 year'), '/');

                # Send them to the main page - or whever you want them to go
                Router::redirect("/");
            }
        }
    }

    public function logout() {

        // Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        // Create the data array we'll use with the update method
        // In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        // Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        // Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        // Send them back to the main index.
        Router::redirect("/");

    }

    public function profile($user_name = NULL) {

        // if user is blank, then they're not logged in - redirect to login
        if (!$this->user) {
            router::redirect('/users/login');
        }

        // pass the profile view to the 'content' area of the master template
        $this->template->content = View::instance('v_users_profile');
    
        // title for this page 
        $this->template->title = $this->user->first_name . " " . $this->user->last_name;

        // pass the user name to the profile view
        $this->template->content->user_name = $user_name;

        //render the view 
        echo $this->template;
    }

    public function profile_update() {
        // if user specified a new image file, upload it
        if ($_FILES['avatar']['error'] == 0)
        {
            //upload an image
            $image = Upload::upload($_FILES, "/uploads/avatars/", array("jpg", "jpeg", "gif", "png"), $this->user->user_id);

            $data = Array("image" => $image);
            DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$this->user->user_id);

            // resize the image
            $imgObj = new Image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image);
            $imgObj->resize(150,150, "crop");
            $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image); 
        }

        // Redirect back to the profile page
        router::redirect('/users/profile'); 
    }  

    public function signup() {

        // Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        // If no POST data was yet submitted, just render the view
        if(!$_POST) {
            echo $this->template;
            return;
        }

        // init error to false
        $error = false;

        // Initiate error
        $this->template->content->error = '';

        // check POST data for valid input
        foreach($_POST as $field_name => $value) { 
            // If any field was blank, add a message to the error View variable
            if($value == "") {
                $this->template->content->error .= '<p>' . $field_name . ' is blank.</p>';
                $error = true;
            }
        }

        // if errors, report them and reload view
        if ($error){
            $this->template->content->error = '<p>All fields are required.</p>';
            echo $this->template;
        }

        // insure password is typed correctly
        if ($_POST['password'] != $_POST['retype']) {
            $this->template->content->error = '<p>Password fields don&apos;t match.</p>';
            echo $this->template;           
        }

        // check whether this user's email already exists (sanitize input first)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);
        $exists = DB::instance(DB_NAME)->select_field("SELECT email FROM users WHERE email = '" . $_POST['email'] . "'");

        if (isset($exists)) {
            $this->template->content->error = '<p>This email address is already registered.</p><p>Perhaps you&apos;d like to <a href="/users/login">login</a> instead?</p>';
            echo $this->template;            
        }

        // if no previous errors, add user to the database!
        else {   
            
            // unset the 'retype' field (not needed in db)
            unset($_POST['retype']);

            // UNIX timestamps for created and modified date
            $_POST['created']  = Time::now();
            $_POST['modified'] = Time::now();

            // Encrypt the password  
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

            // Create an encrypted token via their email address and a random string
            $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

            // Insert this user into the database
            $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

            // Email a welcome message to the new user
            $to[]    = Array("name" => $_POST['first_name'], "email" => $_POST['email']);
            $from    = Array("name" => APP_NAME, "email" => APP_EMAIL);
            $subject = "Welcome to Blabbr!";              
                
            $body = View::instance('v_email_welcome');
                
            // Send email
            Email::send($to, $from, $subject, $body, true, '');

            // log user in using the token we generated
            setcookie("token", $_POST['token'], strtotime('+1 year'), '/');

            // Redirect new user to her profile page
            router::redirect('/users/profile');
        }
    } 

} // eoc
