<?php
/**
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car_index.class.php
 * Description: This class defines a method called "display", which displays all cars.
 **/

class CarIndex extends IndexView
{

    public function display($cars){
        $base_url = BASE_URL;
        //display page header
        parent::displayHeader("List All Cars");

        ?>
        <div id ="ListTitle">
            <h2>List of Cars:</h2>
        </div>
        <a href="<?=$base_url?>/index.php/car/add"><button>Add Car</button></a>
        <div id="CarTable">
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
                    $id = $car->getCarId();
                    $carName = $car->getCarName();
                    $color = $car->getColor();
                    $mpg = $car->getMpg();

                    echo "<tr>
                            <td><a href = '$base_url/index.php/car/detail/$id'>$carName</a></td>
                            <td>$color</td>
                            <td>$mpg</td>
                        </tr>
                        ";
                }
            }?>
        </table>
        </div>



<?php

    }

}?>