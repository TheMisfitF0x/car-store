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
        $base_url = BASE_URL;
        //display page header
        parent::displayHeader("List All Cars");

        ?>
        <h2>List of Cars:</h2>
        <div id="CarTable">
        <table style='border: 1px solid black;'>
            <tr>
                <th style='border: 1px solid black;'>Car Name</th>
                <th style='border: 1px solid black;'>Color</th>
                <th style='border: 1px solid black;'>MPG</th>
            </tr>
            <?php
            if ($cars === 0) {
                echo "No car was found";
            } else {
                foreach ($cars as $i => $car) {
                    $vin = $car->getVin();
                    $carName = $car->getCarName();
                    $color = $car->getColor();
                    $mpg = $car->getMpg();

                    echo "<tr>
                            <td style='border: 1px solid black;'><a href = '$base_url/index.php/car/detail/$vin'>$carName</a></td>
                            <td style='border: 1px solid black;'>$color</td>
                            <td style='border: 1px solid black;'>$mpg</td>
                        </tr>
                        </div>
                        ";
                }
            }

        echo "</table>";
        parent::displayFooter();

    }

}?>