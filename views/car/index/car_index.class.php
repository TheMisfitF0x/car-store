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
        <table>
            <tr>
                <th>Car Name</th>
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
                    $color = $car->getColor();
                    $mpg = $car->getMpg();

                    echo "<tr>
                            <td><a href = '$base_url/index.php/car/detail/$vin'>$carName</a></td>
                            <td>$color</td>
                            <td>$mpg</td>
                        </tr>";
                }
            }

        echo "</table>";
    }
}?>