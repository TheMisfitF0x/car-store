<?php
/**
 * Author: Logan Douglass
 * Date: 4/5/2022
 * File: car_controller.class.php
 * Description: The main controller class responsible for any actions involving cars
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
        try {
            //retrieve all cars and store them in an array
            $cars = $this->car_model->list_car();

            //error handling
            if (!$cars) {
                //display an error
                throw new CarIndexException();
            }

            // display all cars
            $view = new CarIndex();
            $view->display($cars);
        }

        catch (CarIndexException $e){
            $message = $e->getOutput();
            $this->error($message);
        }
    }

    public function detail($id){
        try {
            //retrieve the specific car
            $car = $this->car_model->view_car($id);

            if (!$car) {
                //display an error
                throw new CarDetailException();
            }

            //display car details
            $view = new CarDetail();
            $view->display($car);
        }

        catch (CarDetailException $e){
            $message = $e->getOutput($id);
            $this->error($message);
        }
    }

    //Searches cars from the database
    public function search() {
        try {
            //retrieve query terms from search form
            $query_terms = trim($_GET['query-terms']);

            //if search term is empty, throw an error
            if ($query_terms == "") {
                throw new EmptySearchException();
            }

            //search the database for matching cars
            $cars = $this->car_model->search_car($query_terms);

            //display matched cars
            $search = new SearchCar();
            $search->display($query_terms, $cars);
        }
        catch (EmptySearchException $e){
            $message = $e->getOutput();
            $this->error($message);
        }

    }

    public function add(){
        //Sends the user to the "add car" form
        $view = new CarAdd();
        $view->display();
    }

    public function submit(){
        try {
            //Submits the new car from the "add car" form into the database
            //this should snag the values from POST
            $submit = $this->car_model->submit_car();

            if (!$submit) {
                //handle errors
                throw new CarSubmitException();
            }

            //displays confirmation page
            $view = new CarSubmit();
            $view->display();
        }
        catch (CarSubmitException $e){
            $message = $e->getOutput();
            $this->error($message);
        }
    }

    //Autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $cars = $this->car_model->search_car($query_terms);

        //retrieve all cars and store them in an array
        $carList = array();
        if ($cars) {
            foreach ($cars as $car) {
                $carList[] = $car->getCarName();
            }
        }

        echo json_encode($carList);
    }

    //display a car in a form for editing
    public function edit($id) {
        try {
            //retrieve the specific movie
            $car = $this->car_model->view_car($id);

            if (!$car) {
                //display an error
                throw new CarDetailException();
            }

            $view = new CarEdit();
            $view->display($car);
        }

        catch (CarDetailException $e){
            $message = $e->getOutput($id);
            $this->error($message);
        }

    }

    //update a car in the database
    public function update($id) {
        try {
            //update the car
            $update = $this->car_model->update_car($id);
            if (!$update) {
                throw new CarUpdateException();
            }

            //display the confirmation screen
            $confirm = "The car was successfully updated.";

            $view = new CarUpdate();
            $view->display($confirm);
        }
        catch (CarUpdateException $e){
            $message = $e->getOutput($id);
            $this->error($message);
        }
    }

    //delete a car in the database
    public function delete($id){
        try {
            $delete = $this->car_model->delete_car($id);
            if (!$delete) {
                //handle errors
                throw new CarDeleteException();
            }

            //display the confirmation screen
            $confirm = "The car was successfully deleted.";

            $view = new CarUpdate();
            $view->display($confirm);
        }
        catch (CarDeleteException $e){
            $message = $e->getOutput($id);
            $this->error($message);
        }
    }

    public function error($message){
        //create an object of the Error class
        $error = new CarError();
        //display the error page
        $error->display($message);
    }
}