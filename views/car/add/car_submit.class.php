<?php
/**
 * Author: Logan Douglass
 * Date: April 13, 2022
 * Name: car_submit.class.php
 * Description: This class displays the confirmation message upon a new car being added
 **/
class CarSubmit extends IndexView
{
    public function display(){
        $base_url = BASE_URL;
        parent::displayHeader("Confirmation");
        ?>
            <div class="ListTitle" id="TitleBorder">
                <div>
                    <h2 class="ListTitle" id="TitleText"> Success! Car has been added.</h2>
                </div>
            </div>
        <form method="get" action="<?=$base_url?>/index.php/car/index">

        </form>
        <p style="text-align: center">
            <a href="<?=$base_url?>/index.php/car/index"><button class="GoButton" id="GoButtonStyle">List All Cars</button></a>
        </p>
        <?php
        parent::displayFooter();
    }
}?>