<?php
/**
 * Author: Logan Douglass
 * Date: April 27, 2022
 * Name: sign.class.php
 * Description: This class defines a method called "display", which displays the login confirmation message.
 **/
class Sign extends IndexView
{
    public function display(){
        parent::displayHeader("Success");
        ?>
        <div class="ListTitle" id="TitleBorder">
            <h2 class="ListTitle" id="TitleText">Login Successful</h2>
        </div>
        <?php
        parent::displayFooter();?>

<?php
    }
}?>