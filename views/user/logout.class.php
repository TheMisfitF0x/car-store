<?php
/**
 * Author: Logan Douglass
 * Date: April 27, 2022
 * Name: logout.class.php
 * Description: This class defines a method called "display", which displays the logout confirmation message.
 **/
class Logout extends IndexView
{
    public function display(){
        parent::displayHeader("Logged out");
        echo "Successfully logged out";
        parent::displayFooter();
    }
}