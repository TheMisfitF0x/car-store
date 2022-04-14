<?php

/**
 * Authors:Evan Minor, Logan Douglass
 * Date: 4/13/2022
 * File: search_car.class.php
 * Description:
 */
class SearchCar extends IndexView
{
    public function display($terms, $cars){
    $base_url = BASE_URL;
    //display page header
    parent::displayHeader("List All Cars");
    echo "test";
    ?>
    <h2>List of Cars Containing <?=$terms?>:</h2>
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
                $id = $car->getCarId();
                $carName = $car->getCarName();
                $color = $car->getColor();
                $mpg = $car->getMpg();

                echo "<tr>
                            <td style='border: 1px solid black;'><a href = '$base_url/index.php/car/detail/$id'>$carName</a></td>
                            <td style='border: 1px solid black;'>$color</td>
                            <td style='border: 1px solid black;'>$mpg</td>
                        </tr>";
            }
        }

        echo "</table>";
        }
    }?>
