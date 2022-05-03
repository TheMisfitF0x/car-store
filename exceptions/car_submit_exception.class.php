<?php
/**
 * Author: Logan Douglass
 * Date: 5/3/2022
 * Name: car_submit_exception.class.php
 * Description: Creates a custom exception class to handle car submit errors
 */
class CarSubmitException extends Exception
{
    public function getOutput(){
        return "There was a problem submitting the new car";
    }
}