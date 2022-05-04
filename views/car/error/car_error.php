<?php
/**
 * Author: Isaac Lowe
 * Date: 4/5/2022
 * File: car_error.php
 * Description: How did I get here???
 */

class CarError extends IndexView
{

    public function display($message){
        parent::displayHeader("Error");?>
        <div class="ListTitle" id="TitleBorder">
            <div>
                <h2 class="ListTitle" id="TitleText"><?= $message?></h2>
            </div>
        </div>
<?php
        parent::displayFooter();
    }
}?>