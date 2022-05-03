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
        ?>
        <div class="ListTitle" id="TitleBorder">
            <div>
                <h2 class="ListTitle" id="TitleText"><?= $message?></h2>
            </div>
        </div>

<?php
        parent::displayFooter();


    }
}?>