<?php
/**
 * Author: Logan Douglass
 * Date: 5/3/2022
 * Name: car_detail_exception.class.php
 * Description: Creates a custom exception class to handle car detail errors
 */
class CarDetailException extends Exception
{
    public function getOutput($id){
        return "There was a problem displaying the id='" . $id . "'.";
    }
}