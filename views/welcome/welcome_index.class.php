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
        <a href="<?= BASE_URL ?>/car/index/">
            <p>EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE</p>
        </a>
        <?php
        //display page footer
        parent::displayFooter();
    }

}
