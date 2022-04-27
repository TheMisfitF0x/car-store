<?php
/*
 * Author: Louie Zhu
 * Date: Mar 6, 2016
 * Name: index.class.php
 * Description: This class defines the method "display" that displays the home page.
 */

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Ran's Racing Roadsters");
        ?>

        <div class="HomeImage">
            <img class="HomeImage" src="<?= BASE_URL?>/www/img/homeImage.jpg" alt="homeImage">
        </div>
        <div id="WelcomeText">
            <!-- the title of welcome text-->
            <p style="font-size: 20px">Welcome to <strong>Ran's Racin Racer's</strong></p>
            <!-- Actual paragraph -->
            <p>Welcome to <strong>Ran's</strong> store!  Besides being a full time Professor at IUPUI, <strong>Ran</strong> has been one of the leading Car's Sales Man in Indianapolis for the last <strong>Twenty Years</strong></p>
            <a href="<?= BASE_URL ?>/index.php/car/index/">
                <p style="text-align: center">Lets see what we're racin!</p>
            </a>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
