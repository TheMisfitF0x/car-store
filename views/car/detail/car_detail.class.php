<?php
/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car_index.class.php
 * Description: This class defines a method called "display", which displays all cars.
 */

class CarDetail extends IndexView
{
    public function display($car)
    {
        //display page header
        parent::displayHeader("Car Details");

        ?>
        <h2>Car Details for <?=$car->getCarName()?></h2>
        <table>
            <tr>
                <th>Vin</th>
                <th>Model</th>
                <th>Brand</th>
                <th>Manufacture Year</th>
                <th>Color</th>
                <th>MPG</th>
            </tr>
            <tr>
                          <td><?=$car->getVin()?></td>
                          <td><?=$car->getModel()?></td>
                          <td><?=$car->getBrand()?></td>
                          <td><?=$car->getManYear()?></td>
                          <td><?=$car->getColor()?></td>
                          <td><?=$car->getMpg()?></td>
                      </tr>
        </table>
<?php
    }
}?>
