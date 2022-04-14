<?php

/*
 * Author: Logan Douglass
 * Date: April 6, 2022
 * Name: car.class.php
 * Description: the Car class models a real-world car.
 */

class Car
{
    private $carId, $vin, $carName, $model, $brand, $manYear, $color, $mpg, $image;




    public function __construct($vin, $carName, $model, $brand, $manYear, $color, $mpg, $image)
    {
        $this->vin = $vin;
        $this->carName = $carName;
        $this->model = $model;
        $this->brand = $brand;
        $this->manYear = $manYear;
        $this->color = $color;
        $this->mpg = $mpg;
        $this->image = $image;
    }

    public function getVin()
    {
        return $this->vin;
    }

    public function getCarId()
    {
        return $this->carId;
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

    public function getImage()
    {
        return $this->image;
    }

    public function setCarId($id){
        $this->carId = $id;
    }

}