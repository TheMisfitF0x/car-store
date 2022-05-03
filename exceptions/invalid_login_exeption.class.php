<?php
/**
 * Author: Logan Douglass
 * Date: 4/21/2022
 * Name: email_exception.class.php
 * Description: Creates a custom exception class to handle invalid login errors
 */
class InvalidLoginException extends Exception
{
    public function getOutput(){
        return "Error: Invalid username or password";
    }
}