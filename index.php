<?php

class Vehicle
{
    private $maxSpeed;
    private $currentSpeed;
    private $fuelType;

    public function __construct($maxSpeed, $fuelType)
    {
        $this->maxSpeed = $maxSpeed;
        $this->currentSpeed = 0;
        $this->fuelType = $fuelType;
    }

    public function accelerate($speed) 
    {
        $this->currentSpeed = $speed;
        if ($speed > $this->maxSpeed) {
            $this->maxSpeed = $speed;
        }
    }

    public function brake() 
    {
        $this->currentSpeed = 0;
        $this->maxSpeed = 0;
    }

    public function getCurrentSpeed() 
    {
        return $this->currentSpeed;
    }
}

class Car extends Vehicle
{
    private const NUM_WHEELS = 4;
    private $numDoors;
    private $maxPassengers;
    private $currentPassengers;

    public function __construct($maxSpeed, $fuelType, $numDoors, $maxPassengers)
    {
        parent::__construct($maxSpeed, $fuelType);
        $this->numDoors = $numDoors;
        $this->maxPassengers = $maxPassengers;
        $this->currentPassengers = 0;
    }

    public function boardPassengers($numPassengers)
    {
        if ($this->currentPassengers + $numPassengers <= $this->maxPassengers) {
            $this->currentPassengers += $numPassengers;
        } else {
            echo 'The vehicle is full';
        }
    }
}

class Truck extends Car
{
    private $loadCapacity;
    private $numWheels;

    public function __construct($maxSpeed, $fuelType, $numWheels, $numDoors, $loadCapacity, $maxPassengers)
    {
        parent::__construct($maxSpeed, $fuelType, $numDoors, $maxPassengers);
        $this->numWheels = $numWheels;
        $this->loadCapacity = $loadCapacity;
    }

    public function loadCargo($weight)
    {
        if ($weight <= $this->loadCapacity) {
            $this->loadCapacity -= $weight;
        }
    }
}

class Motorcycle extends Vehicle
{
    private $numSaddlebags;
    private $maxSaddlebags;

    public function __construct($maxSpeed, $fuelType, $maxSaddlebags)
    {
        parent::__construct($maxSpeed, $fuelType);
        $this->numSaddlebags = 0;
        $this->maxSaddlebags = $maxSaddlebags;
    }

    public function addSaddlebag($count)
    {
        if ($this->numSaddlebags + $count <= $this->maxSaddlebags) {
            $this->numSaddlebags += $count;
        } else {
            echo 'Cannot add more saddlebags';
        }
    }
}
