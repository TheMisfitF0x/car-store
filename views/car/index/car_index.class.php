<?php
/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car_index.class.php
 * Description: This class defines a method called "display", which displays all cars.
 */

class CarIndex
{
    public function display($cars){
        //display page header
        parent::displayHeader("List All Cars");

        ?>
        <h2>List of Cars:</h2>
        <table>
            <tr>
                <th>Test</th>
                <th>Test</th>
            </tr>
        </table>
    <?php
    }
}