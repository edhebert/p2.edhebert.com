<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page";
    }

    public function login($error = NULL) {

        // Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

        // Pass data to the view
        $this->template->content->error = $error;

        // Render template
        echo $this->template;

    }

    public function p_login() {

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

            // Send them back to the login page
            Router::redirect("/users/login/error");

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
            router::redirect('users/login');
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

        # Initiate error
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

        // if no errors, add user to the database
        else {   
            // UNIX timestamps for created and modified date
            $_POST['created']  = Time::now();
            $_POST['modified'] = Time::now();

            // Encrypt the password  
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

            // Create an encrypted token via their email address and a random string
            $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

            // Insert this user into the database
            $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

            // TODO - make a view for this and redirect!
            echo 'You\'re signed up';
        }
    }    

} // eoc
