<?php
/**
 * Author: Logan Douglass
 * Date: 4/28/2022
 * File: user_error.php
 * Description: How did I get here???
 */
class UserError extends IndexView
{
    public function display($message){
        parent::displayHeader("Error");
        echo $message;
        parent::displayFooter();


    }
}