<?php

class CarEdit extends IndexView
{
    public function display($car){
        $base_url = BASE_URL;
        parent::displayHeader("Edit Car");
        ?>
        <div class="ListTitle" id="TitleBorder">
            <h2 class="ListTitle" id="TitleText">Edit Car</h2>
        </div>
        <div class="viewCarsTable" id="CarViewBorder">
            <form method="post" action="<?=$base_url?>/index.php/car/update/<?=$car->getCarId()?>" id="UpdateCar">
                <table>
                    <tr>
                        <th class="viewCarsTable">VIN</th>
                        <td class="viewCarsTable" id="link">
                            <input name="vin" type="text" placeholder="Car Vin" required class="AddCarInput" value="<?=$car->getVin()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Car Name</th>
                        <td>
                            <input name="car_name" type="text" placeholder="Car Name" required class="AddCarInput" value="<?=$car->getCarName()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Model</th>
                        <td>
                            <input name="model" type="text" placeholder="Model" required class="AddCarInput" value="<?=$car->getModel()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Brand</th>
                        <td>
                            <input name="brand" type="text" placeholder="Brand" required class="AddCarInput" value="<?=$car->getBrand()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Manufactor Year</th>
                        <td>
                            <input name="man_year" type="number" placeholder="Manufacture Year" required class="AddCarInput" value="<?=$car->getManYear()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Color</th>
                        <td>
                            <input name="color" type="text" placeholder="Color" required class="AddCarInput" value="<?=$car->getColor()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">MPG</th>
                        <td>
                            <input name="mpg" type="number" placeholder="MPG" required class="AddCarInput" value="<?=$car->getMpg()?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Submit" id="AddCarSubmit">
                        </td>
                    </tr>





                </table>
            </form>
        </div>
        <?php
        self::displayFooter();
        ?>
        <?php
    }
}