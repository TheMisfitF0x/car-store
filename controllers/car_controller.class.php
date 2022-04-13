<?php
/**
 * Author: Logan Douglass
 * Date: 4/5/2022
 * File: car_controller.class.php
 * Description:
 */

class CarController
{
    private $car_model;

    //default constructor
    public function __construct() {
        //create an instance of the MovieModel class
        $this->car_model = CarModel::getCarModel();
    }

    public function index(){
        //retrieve all cars and store them in an array
        $cars = $this->car_model->list_car();


        if (!$cars) {
            //display an error
            $message = "There was a problem displaying cars.";
            $this->error($message);
            return;
        }

        // display all movies
        $view = new CarIndex();
        $view->display($cars);
    }

    public function detail($vin){
        //retrieve the specific movie
        $car = $this->car_model->view_car($vin);

        if (!$car) {
            //display an error
            $message = "There was a problem displaying the vin='" . $vin . "'.";
            $this->error($message);
            return;
        }

        //display movie details
        $view = new CarDetail();
        $view->display($car);
    }
    //Searches cars from the database



    public function error($message){
        //create an object of the Error class
        $error = new CarError();
        //display the error page
        $error->display($message);
    }
}