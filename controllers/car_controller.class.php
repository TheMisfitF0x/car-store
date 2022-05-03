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
        try {
            //retrieve query terms from search form
            $query_terms = trim($_GET['query-terms']);

            //if search term is empty, throw an error
            if ($query_terms == "") {
                throw new EmptySearchException("Error: Search cannot be empty");
            }

            //search the database for matching cars
            $cars = $this->car_model->search_car($query_terms);

            /**if ($cars === 0) {
                //handle error
                throw new NoCarsException("Your search yielded no results (There are NO cars!)");
            }**/
            //display matched movies
            $search = new SearchCar();
            $search->display($query_terms, $cars);
        }
        catch (NoCarsException $e){
            $message = $e->getMessage();
            $this->error($message);
        }
        catch (EmptySearchException $e){
            $message = $e->getMessage();
            $this->error($message);
        }

    }

    public function add(){
        //Sends the user to the "add car" form
        $view = new CarAdd();
        $view->display();
    }

    public function submit(){
        //Submits the new car from the "add car" form into the database
        //this should snag the values from POST
        $submit = $this->car_model->submit_car();

        if (!$submit) {
            //handle errors
            $message = "There was a problem submitting the new car=";
            $this->error($message);
            return;
        }

        //displays confirmation page
        $view = new CarSubmit();
        $view->display();
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $cars = $this->car_model->search_car($query_terms);

        //retrieve all movie titles and store them in an array
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