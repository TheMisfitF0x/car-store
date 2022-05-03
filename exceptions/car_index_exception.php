<?php
/**
 * Author: Logan Douglass
 * Date: 5/3/2022
 * Name: car_index_exception.class.php
 * Description: Creates a custom exception class to handle car index errors
 */
class CarIndexException extends Exception
{
    public function getOutput(){
        return "Error: There was a problem displaying cars";
    }
}