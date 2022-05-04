<?php
/**
 * Author: Logan Douglass
 * Date: 4/27/2022
 * File: user_controller.class.php
 * Description: The main controller class responsible for any actions involving users
 */
class UserController
{
    private $user_model;

    //default constructor
    public function __construct() {
        //create an instance of the UserModel class
        $this->user_model = UserModel::getUserModel();
    }

    //Loads in the login form page
    public function login(){
        $login = new Login();
        $login_status = 0;
        if (isset($_SESSION['login_status'])){
            $login_status = $_SESSION['login_status'];
        }

        if ($login_status == 0){
            $login->display();
        }
    }

    //Submits info from the login form into the database
    public function sign(){
        //Grabs login info from post and confirms it exists in the database. Also sets SESSION variables
        $sign = $this->user_model->login();

        try{
            if (!$sign) {
                //throws an error if incorrect login info is put in
                throw new InvalidLoginException();
            }
            $view = new Sign();
            $view->display();
        }

        catch(InvalidLoginException $e){
            $message = $e->getOutput();
            $this->error($message);
        }

    }

    public function logout(){
        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //unset all the session variables
        $_SESSION = array();

        //delete the session cookie
        setcookie(session_name(), "", time() - 3600);

        //destroy the session
        session_destroy();

        $view = new Logout();
        $view->display();
    }

    public function error($message){
        $error = new UserError;
        $error->display($message);
    }
}