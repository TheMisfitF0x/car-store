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
        <div class="ListTitle" id="TitleBorder">
            <div>
                <h2 class ="ListTitle" id="TitleText">Select Your Next Ride</h2>
            </div>
        </div>
        <div class="viewCarsTable" id="CarViewBorder">
        <table class="viewCarsTable">
            <tr>
                <th class="viewCarsTable">Car Name</th>
                <th class="viewCarsTable">Color</th>
                <th class="viewCarsTable">MPG</th>
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
                            <td class='viewCarsTable' id='link'><a href = '$base_url/index.php/car/detail/$id'>$carName</a></td>
                            <td class='viewCarsTable' id='normal'>$color</td>
                            <td class='viewCarsTable' id='normal'>$mpg</td>
                        </tr>
                        ";
                }
            }?>
        </table>
            <?php
                $role = 0;
                if (isset($_SESSION['role'])){
                    $role = $_SESSION['role'];
                }
                if ($role==2){
                    ?><a href="<?=$base_url?>/index.php/car/add"><button class="AddCar" id="AddCarButton">Add Car to DataBase</button></a><?php
                }
            ?>
        </div>


        <?php
        parent::displayFooter();
        ?>


<?php

    }

}?>