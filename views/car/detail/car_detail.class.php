<?php
/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car_detail.class.php
 * Description: This class defines a method called "display", which displays car details.
 */

class CarDetail extends IndexView
{
    public function display($car)
    {
        //display page header
        parent::displayHeader("Car Details");

        ?>
        <h2>Car Details for <?=$car->getCarName()?></h2>
        <table style='border: 1px solid black;'>
            <tr>
                <th style='border: 1px solid black;'>Vin</th>
                <th style='border: 1px solid black;'>Model</th>
                <th style='border: 1px solid black;'>Brand</th>
                <th style='border: 1px solid black;'>Manufacture Year</th>
                <th style='border: 1px solid black;'>Color</th>
                <th style='border: 1px solid black;'>MPG</th>
            </tr>
            <tr>
                          <td style='border: 1px solid black;'><?=$car->getVin()?></td>
                          <td style='border: 1px solid black;'><?=$car->getModel()?></td>
                          <td style='border: 1px solid black;'><?=$car->getBrand()?></td>
                          <td style='border: 1px solid black;'><?=$car->getManYear()?></td>
                          <td style='border: 1px solid black;'><?=$car->getColor()?></td>
                          <td style='border: 1px solid black;'><?=$car->getMpg()?></td>
                      </tr>
        </table>
<?php
    }
}?>
