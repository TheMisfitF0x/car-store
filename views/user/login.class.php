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
        $base_url = BASE_URL;
        parent::displayHeader("Login");
        ?>
        <h1>Login</h1>
        <form method="post" action="<?=$base_url?>/index.php/user/sign" id="Login">
            <input name="email" type="email" placeholder="Email" required class="LoginInput">
            <input name="password" type="password" placeholder="Password" required class="LoginInput">
            <input type="submit">
        </form>
        <?php
        parent::displayFooter();
    }
}