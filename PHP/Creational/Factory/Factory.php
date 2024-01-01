<?php
// No Creator abstract class or interface! Just a Concrete Creator!

/* Definition:
    The Factory pattern is a creational design pattern that provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created. Its purpose is to create objects without specifying the exact class of object that will be created, allowing for flexibility and abstraction in object creation.
*/

/*
    Difference between Factory Method desing pattern Vs. Factory design pattern:
        The Factory Method design pattern is a specific implementation of the Factory pattern. It defines an interface for creating an object, but it lets the subclasses decide which class to instantiate. This pattern promotes the idea of creating objects through inheritance. It involves creating an interface (or an abstract class) with a method (the factory method) that subclasses implement to produce objects.
        The Factory        design pattern is a creational pattern that aims to create objects without specifying the exact class of the object that will be created. It provides an interface for creating objects in a superclass but allows the subclasses to alter the type of objects that will be created. This pattern includes a factory class that has a method responsible for creating objects based on a certain condition or input.
        In essence, the Factory Method pattern is a particular implementation of the broader Factory pattern. The Factory Method focuses on creating instances of classes through inheritance, allowing subclasses to define the actual objects created, while the Factory pattern delegates the responsibility of creating objects to a separate factory class, providing a more centralized creation mechanism.
*/

/*
    Explanation of the difference:
        In the Factory Design Pattern example, the VehicleFactory class directly creates different types of vehicles based on a parameter passed to the createVehicle method.
        In contrast, the Factory Method Design Pattern splits the creation process into separate classes (CarFactory, BikeFactory) implementing the VehicleFactory interface. Each factory class is responsible for creating a specific type of vehicle.
        Both patterns provide a way to create objects but differ in their implementation approaches: the Factory Pattern uses a centralized factory class to create objects based on input parameters, while the Factory Method Pattern delegates object creation to separate subclasses implementing a factory method for creating specific types of objects.
*/


// Product interface
interface Vehicle {
    public function drive(): void;
}


// Concrete Product - Car
class Car implements Vehicle {
    public function drive(): void {
        echo "Driving a car...\n";
    }
}

// Another Concrete Product - Bicycle
class Bicycle implements Vehicle {
    public function drive(): void {
        echo "Riding a bicycle...\n";
    }
}



// There is NO Creator abstract class or interface! Just a Concrete Creator!
class VehicleFactory {
    public function createVehicle($type) {
        switch ($type) {
            case 'car' : return new Car();
            case 'bike': return new Bicycle();
            default    : throw new InvalidArgumentException("Invalid vehicle type");
        }
    }
}



// Implementation / Client code / Usage:
$vehicleFactory = new VehicleFactory();
$carObject = $vehicleFactory->createVehicle('car');
$carObject->drive();