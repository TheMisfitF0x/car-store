<?php
/**
 * Author: Logan Douglass
 * Date: 5/3/2022
 * Name: car_delete_exception.class.php
 * Description: Creates a custom exception class to handle car delete errors
 */
class CarDeleteException extends Exception
{
    public function getOutput($id){
        return "There was a problem deleting the car at='" . $id . "'.";
    }
}