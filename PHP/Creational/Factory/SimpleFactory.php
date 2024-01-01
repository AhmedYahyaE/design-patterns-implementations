<?php

class Car {}
class Truck {}


// Simple Factory class responsible for creating objects
class SimpleVehicleFactory {
    public function createVehicle($type) {
        switch ($type) {
            case 'car'  : return new Car();
            case 'truck': return new Truck();
            default     : throw new Exception("Invalid vehicle type");
        }
    }
}



// Implementation / Client code / Usage:
$simpleFactory = new SimpleVehicleFactory();

$car   = $simpleFactory->createVehicle('car');
$truck = $simpleFactory->createVehicle('truck');

$car->drive();   // Output: Driving a car
$truck->drive(); // Output: Driving a truck