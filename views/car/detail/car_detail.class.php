<?php
/**
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car_detail.class.php
 * Description: This class defines a method called "display", which displays car details.
 **/

class CarDetail extends IndexView
{
    public function display($car)
    {
        $base_url = BASE_URL;
        //display page header
        parent::displayHeader("Car Details");

        ?>
        <div class="ListTitle" id="TitleBorder">
            <div >
                <h2 class="ListTitle" id="TitleText"><em>Car Details for <?=$car->getCarName()?></em></h2>
            </div>
        </div>
        <div class="CarTable" id="InvCarBorder">
            <div class="CarImage" style="background-image: url(../../../www/img/<?=$car->getImage()?>)"></div>
            <!--<img class="CarTable" src="../../../www/img/<?=$car->getImage()?>">-->
        <table class="CarTable">
            <tr>
                <th class="CarTable">Vin</th>
                <th class="CarTable">Model</th>
                <th class="CarTable">Brand</th>
                <th class="CarTable">Manufacture Year</th>
                <th class="CarTable">Color</th>
                <th class="CarTable">MPG</th>
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
            $role = 0;
            if (isset($_SESSION['role'])){
                $role = $_SESSION['role'];
            }
            if ($role==2){
                ?><a href="<?=$base_url?>/index.php/car/edit/<?=$car->getCarId()?>">Edit</a>
                    <a href="<?=$base_url?>/index.php/car/delete/<?=$car->getCarId()?>">Delete</a><?php
            }
            ?>

        </div>
        <?php
       self::displayFooter();
        ?>

<?php
    }
}?>
