<?php
/**
 * Author: Logan Douglass
 * Date: April 27, 2022
 * Name: login.class.php
 * Description: This class defines a method called "display", which displays the user login form.
 **/
class Login extends IndexView
{
    public function display(){
        parent::displayHeader("Login");
        ?>
        <h1>Login</h1>

        <?php
        parent::displayFooter();
    }
}