<?php

class Database
{
//define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'rans_roadsters',
        'tblCars' => 'cars',
        'tblUsers' => 'users',
        'tblOrders' => 'orders',
        'tblSuppliers' => 'suppliers'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
            $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'car_error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores movies
    public function getCarTable() {
        return $this->param['tblCars'];
    }

    //returns the name of the table that stores books
    public function getOrderTable() {
        return $this->param['tblOrders'];
    }

    //returns the name of the table storing games
    public function getUserTable() {
        return $this->param['tblUsers'];
    }

    //returns the name of the table storing cds
    public function getSuppliersTable() {
        return $this->param['tblSuppliers'];
    }

}