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
        //create an instance of the MovieModel class
        //$this->user_model = UserModel::getUserModel();
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
        echo "test";
    }
}