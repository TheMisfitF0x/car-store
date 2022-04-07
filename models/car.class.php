<?php

/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car.class.php
 * Description: the Car class models a real-world car.
 */

class Car
{
    private $vin, $carName, $model, $brand, $manYear, $color, $mpg;



    public function __construct($vin, $model, $carName, $brand, $manYear, $color, $mpg)
    {
        $this->vin = $vin;
        $this->carName = $carName;
        $this->model = $model;
        $this->brand = $brand;
        $this->manYear = $manYear;
        $this->color = $color;
        $this->mpg = $mpg;
    }

    public function getVin()
    {
        return $this->vin;
    }

    public function getCarName()
    {
        return $this->carName;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getManYear()
    {
        return $this->manYear;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getMpg()
    {
        return $this->mpg;
    }

    public function setVin($vin){
        $this->vin = $vin;
    }

}