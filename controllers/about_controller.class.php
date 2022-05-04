<?php
/*
 * Author: Evan Minor
 * Date: May 3, 2022
 * File: about_controller.class.php
 * Description: This scripts define the class for the about controller whose soul purpose is to load the about page.
 *
 */

class AboutController {
    //put your code here
    public function index() {
        $view = new AboutIndex();
        $view->display();
    }
}