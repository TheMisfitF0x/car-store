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

    public function detail($id){
        //retrieve the specific car
        $car = $this->car_model->view_car($id);

        if (!$car) {
            //display an error
            $message = "There was a problem displaying the id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display movie details
        $view = new CarDetail();
        $view->display($car);
    }

    //Searches cars from the database
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all movies
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $cars = $this->car_model->search_car($query_terms);

        if ($cars === false) {
            //handle error
            $message = "There ARE NO CARS!.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new CarSearch();
        $search->display($query_terms, $cars);
    }

    //display a movie in a form for editing
    public function edit($id) {
        //retrieve the specific movie
        $car = $this->car_model->view_car($id);

        if (!$car) {
            //display an error
            $message = "There was a problem displaying the car id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new CarEdit();
        $view->display($car);
    }

    //update a movie in the database
    public function update($id) {
        //update the movie
        $update = $this->car_model->update_car($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the car id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display the updateed movie details
        $confirm = "The car was successfully updated.";
        $car = $this->car_model->view_car($id);

        $view = new CarDetail();
        $view->display($car, $confirm);
    }

    public function error($message){
        //create an object of the Error class
        $error = new CarError();
        //display the error page
        $error->display($message);
    }
}