<?php
/* Definition:
    The Factory pattern is a creational design pattern that provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created. Its purpose is to create objects without specifying the exact class of object that will be created, allowing for flexibility and abstraction in object creation.
*/

/* Purpose:
    Create objects without specifying the exact class of object that will be created, allowing for flexibility and abstraction in object creation.

    1) Encapsulation of Object Creation: It encapsulates the object creation logic within a designated class or method, separating it from the rest of the code. This promotes loose coupling between the creator and the created objects.
    2) Abstraction and Interface-Based Object Creation: It allows the code to work with an interface or abstract class, making the client code independent of the specific classes being instantiated. This enhances flexibility by enabling the creation of various related objects without directly specifying their concrete types.
    3) Centralized Control of Object Creation: By centralizing the object creation logic in a factory method or class, it provides a single place to manage and control the instantiation process. This simplifies maintenance and modification of the creation process.
    4) Support for Dependency Injection: It facilitates the injection of dependencies by decoupling the client code from the concrete classes, enabling easier testing, maintenance, and substitution of objects.
    5) Support for Extensibility: The Factory pattern allows easy extension by adding new subclasses without modifying existing client code. This makes it convenient to incorporate new types of objects or variations without affecting the overall system.
*/

/* Structure:
    1) Creator abstract class or interface: This is the superclass that declares the factory method. It provides an interface for creating objects but doesn't specify the exact objects that will be created.
    2) Concrete Creator: Subclasses of the Creator implement the factory method to produce specific types of objects.
    3) Product Interface: The interface or abstract class for the objects created by the factory method.
    4) Concrete Product: Classes that implement or extend the Product interface/abstract class.
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



// Creator abstract class or interface - VehicleFactory
abstract class VehicleFactory {
    abstract public function createVehicle(): Vehicle;
    
    public function startDriving(): void {
        $vehicle = $this->createVehicle();
        $vehicle->drive();
    }
}


// ConcreteCreator - CarFactory
class CarFactory extends VehicleFactory {
    public function createVehicle(): Vehicle {
        return new Car();
    }
}

// Another ConcreteCreator - BicycleFactory
class BicycleFactory extends VehicleFactory {
    public function createVehicle(): Vehicle {
        return new Bicycle();
    }
}



// Implementation (Client code / Usage):
$carFactory = new CarFactory();
$carFactory->startDriving(); // Output: Driving a car...

$bicycleFactory = new BicycleFactory();
$bicycleFactory->startDriving(); // Output: Riding a bicycle...