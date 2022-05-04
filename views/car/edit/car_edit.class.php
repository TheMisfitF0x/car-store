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
                <table class="viewCarsTable" id="addCar">
                    <tr>
                        <th class="viewCarsTable">VIN</th>
                        <td class="viewCarsTable" id="linkwhite">
                            <input name="vin" type="text" placeholder="Car Vin" required class="AddCarInput" value="<?=$car->getVin()?>"  maxlength="17">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Car Name</th>
                        <td class="viewCarsTable" id="linkwhite">
                            <input name="car_name" type="text" placeholder="Car Name" required class="AddCarInput" value="<?=$car->getCarName()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Model</th>
                        <td class="viewCarsTable" id="linkwhite">
                            <input name="model" type="text" placeholder="Model" required class="AddCarInput" value="<?=$car->getModel()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Brand</th>
                        <td class="viewCarsTable" id="linkwhite">
                            <input name="brand" type="text" placeholder="Brand" required class="AddCarInput" value="<?=$car->getBrand()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Manufactor Year</th>
                        <td class="viewCarsTable" id="linkwhite">
                            <input name="man_year" type="number" placeholder="Manufacture Year" required class="AddCarInput" value="<?=$car->getManYear()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Color</th>
                        <td class="viewCarsTable" id="linkwhite">
                            <input name="color" type="text" placeholder="Color" required class="AddCarInput" value="<?=$car->getColor()?>">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">MPG</th>
                        <td class="viewCarsTable" id="linkwhite">
                            <input name="mpg" type="number" placeholder="MPG" required class="AddCarInput" value="<?=$car->getMpg()?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Submit Edited Car</p>
                        </td>
                        <td class="viewCarsTable" id="linkwhite">
                            <input type="submit" value="Submit" class="GoButton" id="GoButtonStyle">
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