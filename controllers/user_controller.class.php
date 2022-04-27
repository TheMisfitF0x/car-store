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

    public function login(){
        $login = new Login();
        $login->display();
    }
}