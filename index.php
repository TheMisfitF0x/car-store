<?php
/*
 * Author: Louie Zhu
 * Date: October 16, 2017
 * Name: index.php
 * Description: The homepage
 */

//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");
//require_once ("views/index_view.class.php");
//require_once ("views/car/index/car_index.class.php");
//require_once ("application/dispatcher.class.php");
//require_once ("controllers/welcome_controller.class.php");




//load the dispatcher that dissects a request URL
new Dispatcher();

