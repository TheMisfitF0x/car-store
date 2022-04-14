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
        <h2>Success! Car has been added.</h2>
        <a href="<?=$base_url?>/index.php/car/index"><button>List All Cars</button></a>
        <?php
    }
}