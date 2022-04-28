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
        <div class="ListTitle" id="TitleBorder">
            <h2 class="ListTitle" id="TitleText">Login</h2>
        </div>
        <div class="viewCarsTable" id="CarViewBorder">
            <form method="post" action="<?=$base_url?>/index.php/user/sign" id="Login">
                <table >
                    <tr>
                        <th class="viewCarsTable" id="password">Email</th>
                        <td>
                            <input name="email" type="email" placeholder="Email" required class="LoginInput">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Password</th>
                        <td>
                            <input name="password" type="password" placeholder="Password" required class="LoginInput">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
        <?php
        parent::displayFooter();
    }
}