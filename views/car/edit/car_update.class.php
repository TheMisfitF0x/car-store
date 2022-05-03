<?php

class CarUpdate extends IndexView
{
    public function display($confirm){
        //display page header
        parent::displayHeader("Success");
        echo $confirm;
        self::displayFooter();
    }
}