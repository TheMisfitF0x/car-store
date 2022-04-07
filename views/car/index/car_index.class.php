<?php
/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car_index.class.php
 * Description: This class defines a method called "display", which displays all cars.
 */

class CarIndex extends IndexView
{
    public function display($cars){
        //display page header
        parent::displayHeader("List All Cars");

        ?>
        <h2>List of Cars:</h2>
        <table>
            <tr>
                <th>Vin</th>
                <th>Car Name</th>
                <th>Model</th>
                <th>Brand</th>
                <th>Manufacture Year</th>
                <th>Color</th>
                <th>MPG</th>
            </tr>
            <?php
            if ($cars === 0) {
                echo "No car was found";
            } else {
                foreach ($cars as $i => $car) {
                    $vin = $car->getVin();
                    $carName = $car->getCarName();
                    $model = $car->getModel();
                    $brand = $car->getBrand();
                    $manYear = $car->getManYear();
                    $color = $car->getColor();
                    $mpg = $car->getMpg();
                }
            }

        echo "</table>";
    }
}?>