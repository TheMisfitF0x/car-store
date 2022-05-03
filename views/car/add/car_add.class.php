<?php
/**
 * Author: Logan Douglass
 * Date: April 13, 2022
 * Name: car_add.class.php
 * Description: This class defines a method called "display", which displays the form for adding a new car.
 **/
class CarAdd extends IndexView
{
    public function display(){
        $base_url = BASE_URL;
        parent::displayHeader("Add New Car");
        ?>
        <div class="ListTitle" id="TitleBorder">
            <h2 class="ListTitle" id="TitleText">Add a New Car</h2>
        </div>
        <div class="viewCarsTable" id="CarViewBorder">
        <form method="post" action="<?=$base_url?>/index.php/car/submit" id="AddCar">
            <table>
                    <tr>
                        <th class="viewCarsTable">VIN</th>
                        <td class="viewCarsTable" id="link">
                            <input name="vin" type="text" placeholder="Car Vin" required class="AddCarInput" maxlength="17">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Car Name</th>
                        <td>
                            <input name="car_name" type="text" placeholder="Car Name" required class="AddCarInput">
                        </td>
                    </tr>
                    <tr>
                    <th class="viewCarsTable">Model</th>
                        <td>
                            <input name="model" type="text" placeholder="Model" required class="AddCarInput">
                        </td>
                    </tr>
                    <tr>
                    <th class="viewCarsTable">Brand</th>
                        <td>
                            <input name="brand" type="text" placeholder="Brand" required class="AddCarInput">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Manufactor Year</th>
                        <td>
                            <input name="man_year" type="number" placeholder="Manufacture Year" required class="AddCarInput">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">Color</th>
                        <td>
                            <input name="color" type="text" placeholder="Color" required class="AddCarInput">
                        </td>
                    </tr>
                    <tr>
                        <th class="viewCarsTable">MPG</th>
                        <td>
                            <input name="mpg" type="number" placeholder="MPG" required class="AddCarInput">
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

}?>