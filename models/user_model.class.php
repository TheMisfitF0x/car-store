<?php

/**
 * Author: Logan Orender
 * Date: 4/27/2022
 * File: user_model.class.php
 * Description:
 */
class UserModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUsers;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getCarModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }


    }

    //static method to ensure there is just one UserModel instance
    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    /*
     * the list_Car method retrieves all Cars from the database and
     * returns an array of Car objects if successful or false if failed.
     * Cars should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function login(){
        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //create variable login status.
        $_SESSION['login_status'] = 0;
        $email = $password = "";

        //retrieve username and password from the form in the login form
        if (filter_has_var(INPUT_POST, 'email') || filter_has_var(INPUT_POST, 'password')) {
            $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
            $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        }

        //validate email and password against a record in the users table in the database. If they are valid, create session variables.
        $sql = "SELECT * FROM " . $this->tblUsers . " WHERE Email='$email' AND Password='$password'";
        $query = $this->dbConnection->query($sql);


        if ($query->num_rows) {
            //It is a valid user. Need to store the user in session variables.
            $row = $query->fetch_assoc();
            $_SESSION['login'] = $email;
            $_SESSION['role'] = $row['UserType'];
            $_SESSION['name'] = $row['FirstName'];
            $_SESSION['login_status'] = 1;
        }

        //close the connection
        $this->dbConnection->close();
    }

    public function list_user() {


        $sql = "SELECT * FROM " . $this->tblUsers ;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no user was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned Users
        $users = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $user = new User($obj->Email, $obj->password, $obj->FirstName, $obj->LastName, $obj->UserType);
            //set the id for the User
            $user->setUserId($obj->UserID);

            //add the user into the array
            $users[] = $user;
        }
        return $users;
    }

    /*
     * the viewUser method retrieves the details of the user specified by its id
     * and returns a user object. Return false if failed.
     */

    public function view_user($id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblUsers .
            " WHERE " . $this->tblUsers . ".UserID='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a user object
            $user = new User($obj->Email, $obj->password, $obj->FirstName, $obj->LastName, $obj->UserType);

            //set the id for the User
            $user->setUserId($obj->UserID);

            return $user;
        }

        return false;
    }


    //search the database for users that match words in terms. Return an array of users if any are found; false otherwise.
    public function search_user($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblUsers .
            " WHERE (1";

        foreach ($terms as $term) {
            $sql .= " AND (FirstName LIKE '%" . $term . "%' OR LastName LIKE '%" . $term . "%')";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no user was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 user found.
        //create an array to store all the returned users
        $users = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            //create a user object
            $user = new User($obj->Email, $obj->password, $obj->FirstName, $obj->LastName, $obj->UserType);

            //set the id for the User
            $user->setUserId($obj->UserID);

            //add the user into the array
            $users[] = $user;
        }
        return $users;
    }

    public function update_user($id) {
        //if the script did not receive post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'password') ||
            !filter_has_var(INPUT_POST, 'first_name') ||
            !filter_has_var(INPUT_POST, 'last_name')) {

            return false;
        }

        //retrieve data for the new user; data is sanitized and escaped for security's sake.
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        $firstName = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
        $lastName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING)));
        $userType = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_NUMBER_INT)));

        //query string for update
        $sql = "UPDATE " . $this->tblUsers .
            " SET Email='$email', Password='$password', first_name='$firstName', LastName='$$lastName', "
            . "UserType='$userType' WHERE id='$id'";

        //execute the query
        return $this->dbConnection->query($sql);
    }

    public function submit_user() {
        //if the script did not receive post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'password') ||
            !filter_has_var(INPUT_POST, 'first_name') ||
            !filter_has_var(INPUT_POST, 'last_name')) {

            return false;
        }

        //retrieve data for the new user; data is sanitized and escaped for security's sake.
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
        $firstName = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
        $lastName = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING)));


        //query string for add
        $sql = "INSERT INTO " . $this->tblUsers . " VALUES (NULL, '$email', '$password', '$firstName', '$lastName', 1)";

        //execute the query
        return $this->dbConnection->query($sql);
    }
}