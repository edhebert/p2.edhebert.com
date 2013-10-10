<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function profile($user_name = NULL) {

        // pass the profile view to the 'content' area of the master template
        $this->template->content = View::instance('v_users_profile');
    
        // title for this page 
        $this->template->title = "Profile";

        // pass the user name to the profile view
        $this->template->content->user_name = $user_name;

        //render the view 
        echo $this->template;
    }

} // eoc