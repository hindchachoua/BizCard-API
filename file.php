<?php

class Vehicle {
    protected $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function time($distance, $speed) {
        return $distance / $speed;
    }
}

class Car extends Vehicle {
    private $name;

    public function __construct($name, $type) {
        parent::__construct($type);
        $this->name = $name;
    }

    public function getName() {
        echo "Name of the car is " . $this->name . "<br>";
    }

    public function calculateTime($distance, $speed) {
        $time = $this->time($distance, $speed);
        echo "Time taken to cover the distance: " . $time . " hours<br>";
    }
}

// Example usage:
$car = new Car("Toyota", "Sedan");
$car->getName();
$car->calculateTime(100, 60); 
?>
