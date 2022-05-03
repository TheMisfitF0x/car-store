<?php
/**
 * Author: Logan Douglass
 * Date: 4/21/2022
 * Name: email_exception.class.php
 * Description: Creates a custom exception class to handle invalid login errors
 */
class InvalidLoginException extends Exception
{
    public function getOutput(){?>
<div class="ListTitle" id="TitleBorder">
    <div >
        <h2 class="ListTitle" id="TitleText">Error: Invalid username or password</h2>
    </div>
</div>

<?php
    }
}?>