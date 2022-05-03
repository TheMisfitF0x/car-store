<?php

class CarIndexException extends Exception
{
    public function getOutput(){
        return "Error: There was a problem displaying cars";
    }
}