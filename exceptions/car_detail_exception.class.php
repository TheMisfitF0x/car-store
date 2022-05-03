<?php

class CarDetailException extends Exception
{
    public function getOutput($id){
        return "There was a problem displaying the id='" . $id . "'.";
    }
}