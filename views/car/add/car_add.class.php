<?php
/**
 * Author: Logan Douglass
 * Date: April 13, 2022
 * Name: car_add.class.php
 * Description: This class defines a method called "display", which displays the form for adding a new car.
 **/
class CarAdd extends IndexView
{
    public function display(){
        $base_url = BASE_URL;
        parent::displayHeader("Add New Car");
        ?>
        <h2>Add a New Car</h2>
        <form method="post" action="<?=$base_url?>/index.php/car/submit" id="AddCar">
            <input name="vin" type="text" placeholder="Car Vin" required class="AddCarInput">
            <input name="car_name" type="text" placeholder="Car Name" required class="AddCarInput">
            <input name="model" type="text" placeholder="Model" required class="AddCarInput">
            <input name="brand" type="text" placeholder="Brand" required class="AddCarInput">
            <input name="man_year" type="number" placeholder="Manufacture Year" required class="AddCarInput">
            <input name="color" type="text" placeholder="Color" required class="AddCarInput">
            <input name="mpg" type="number" placeholder="MPG" required class="AddCarInput">
            <input type="submit" value="Submit" id="AddCarSubmit">
        </form>
        <?php
    }

}