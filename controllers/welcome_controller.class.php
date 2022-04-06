<?php
/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * File: welcome_controller.class.php
 * Description: This scripts define the class for the welcome controller; this is the default controller.
 *
 */

class WelcomeController {
    public function index() {
        $view = new WelcomeIndex();
        $view->display();
    }
}