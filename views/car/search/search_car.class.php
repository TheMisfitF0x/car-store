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
    parent::displayHeader("Search Results");
    ?>
<div class="ListTitle" id="TitleBorder" xmlns="http://www.w3.org/1999/html">
        <h2 class="ListTitle" id="TitleText">List of Cars Containing <strong>"<?=$terms?>"</strong>:</h2>
    </div>


        <?php
        if ($cars === 0) {
            echo "
                        <div>
                            <h2 class='ListTitle' id='TitleText'>404 No car found..</h2>
                        </div>";
        } else {
            foreach ($cars as $i => $car) {
                $id = $car->getCarId();
                $carName = $car->getCarName();
                $color = $car->getColor();
                $mpg = $car->getMpg();

                echo "  
        <div class='viewCarsTable' id='CarViewBorder'>
              <table class='viewCarsTable'>
  
                        <tr>
                            <th class='viewCarsTable'>Car Name</th>
                            <th class='viewCarsTable'>Color</th>
                            <th class='viewCarsTable'>MPG</th>
                        </tr>
                        <tr>
                            <td class='viewCarsTable' id='link' ><a href = '$base_url/index.php/car/detail/$id'>$carName</a></td>
                            <td class='viewCarsTable' id='normal' style='border: 1px solid black;'>$color</td>
                            <td class='viewCarsTable' id='normal'>$mpg</td>
                        </tr>
               </table>
        </div>  
                        ";
            }
        }?>

        <?php
        self::displayFooter();
        ?>


<?php
        }
    }?>
