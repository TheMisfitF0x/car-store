<?php

/**
 * Author: Logan Orender
 * Date: 4/6/2022
 * File: car_model.class.php
 * Description:
 */
class CarModel extends Model
{


    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblCars;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getMovieModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCars = $this->db->getCarTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }


    }

    //static method to ensure there is just one MovieModel instance
    public static function getCarModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new CarModel();
        }
        return self::$_instance;
    }

    /*
     * the list_movie method retrieves all movies from the database and
     * returns an array of Movie objects if successful or false if failed.
     * Movies should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function list_car() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblCars . "," . $this->tblMovieRating .
            " WHERE " . $this->tblCars . ".rating=" . $this->tblMovieRating . ".rating_id";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no car was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned movies
        $cars = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $car = new Car(stripslashes($obj->title), stripslashes($obj->rating), stripslashes($obj->release_date), stripslashes($obj->director), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $car->setId($obj->id);

            //add the movie into the array
            $cars[] = $car;
        }
        return $cars;
    }

    /*
     * the viewMovie method retrieves the details of the movie specified by its id
     * and returns a movie object. Return false if failed.
     */

    public function view_car($id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblCars . "," . $this->tblMovieRating .
            " WHERE " . $this->tblCars . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a movie object
            $movie = new Movie(stripslashes($obj->title), stripslashes($obj->rating), stripslashes($obj->release_date), stripslashes($obj->director), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $movie->setId($obj->id);

            return $movie;
        }

        return false;
    }


    //search the database for cars that match words in terms. Return an array of cars if any are found; false otherwise.
    public function search_car($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblCars . "," . $this->tblMovieRating .
            " WHERE " . $this->tblCars . ".rating=" . $this->tblMovieRating . ".rating_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $movies = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $movie = new Movie($obj->title, $obj->rating, $obj->release_date, $obj->director, $obj->image, $obj->description);

            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }

    //get all movie ratings
    private function get_movie_ratings() {
        $sql = "SELECT * FROM " . $this->tblMovieRating;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $ratings = array();
        while ($obj = $query->fetch_object()) {
            $ratings[$obj->rating] = $obj->rating_id;
        }
        return $ratings;
    }

    public function update_car($id) {
        //if the script did not receive post data, display an error message and then terminate the script immediately
//        if (!filter_has_var(INPUT_POST, 'title') ||
//            !filter_has_var(INPUT_POST, 'rating') ||
//            !filter_has_var(INPUT_POST, 'release_date') ||
//            !filter_has_var(INPUT_POST, 'director') ||
//            !filter_has_var(INPUT_POST, 'image') ||
//            !filter_has_var(INPUT_POST, 'description')) {
//
//            return false;
//        }

        //retrieve data for the new car; data is sanitized and escaped for security's sake.
//        $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
//        $rating = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING)));
//        $release_date = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'release_date', FILTER_DEFAULT));
//        $director = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING)));
//        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
//        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

        //query string for update
//        $sql = "UPDATE " . $this->tblCars .
//            " SET title='$title', rating='$rating', release_date='$release_date', director='$director', "
//            . "image='$image', description='$description' WHERE id='$id'";

        //execute the query
        //return $this->dbConnection->query($sql);
    }
}