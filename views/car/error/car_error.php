<?php
/**
 * Author: Isaac Lowe
 * Date: 4/5/2022
 * File: car_error.php
 * Description: How did I get here???
 */

class CarError extends IndexView
{

    public function display($message)
    {
        ?>
        <p><?=$message?></p>
<?php
    }
}?>