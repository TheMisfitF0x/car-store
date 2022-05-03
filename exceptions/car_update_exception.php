<?php
/**
 * Author: Logan Douglass
 * Date: 5/3/2022
 * Name: car_update_exception.class.php
 * Description: Creates a custom exception class to handle car update errors
 */
class CarUpdateException extends Exception
{
    public function getOutput($id){
        return "There was a problem updating the car id='" . $id . "'.";
    }
}