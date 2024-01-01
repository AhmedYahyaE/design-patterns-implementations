<?php

// Definition: The Abstract Factory design pattern is a creational pattern that provides an interface to create families of related or dependent objects without specifying their concrete classes. It belongs to the category of Factory patterns and focuses on creating objects in a way that is independent of how they're implemented.
// Purpose: The Abstract Factory pattern aims to provide an interface for creating families of related or dependent objects while ensuring they are compatible with each other. It allows the client code to work with these objects without specifying their concrete classes, enhancing flexibility and facilitating the exchange of object families.
/*
    Structure/Components:
        1) Abstract Factory: Provides methods to create families of related products.
        2) Concrete Factory: Implements the methods of the Abstract Factory to create specific products belonging to a family.
        3) Abstract Product: Declares interfaces for a set of related products.
        4) Concrete Product: Implements the interfaces defined by Abstract Product. These are the actual objects created by Concrete Factories.
        5) Client: Initiates the creation of objects using the Abstract Factory interface.
*/

/*
    Benefits:
        1) Encapsulation: It encapsulates the object creation process, ensuring the client works with families of objects without knowledge of their specific implementations.
        2) Flexibility: The pattern allows for easy replacement of entire families of products by switching concrete factories.
        3) Consistency: Ensures that the created objects are compatible with each other since they belong to the same family.

    Drawbacks:
        1) Complexity: Introducing new product families or modifying existing ones can be complex and may require changes to the entire hierarchy of factories and products.
        2) Abstraction Overhead: Creating multiple layers of abstraction might increase the complexity of the codebase without necessarily adding value in simpler scenarios.
*/

/*
    Difference between Abstract Factory desing pattern Vs. Factory Method design pattern:
        Factory Method:
            - Objective: It defines an interface for creating an object, allowing subclasses to alter the type of objects that will be created.
            - Structure: In this pattern, there is an abstract class that provides an interface for creating objects. Subclasses of this abstract class implement the method to create the specific objects.
            - Usage: It's useful when you have a class that cannot anticipate the type of objects it needs to create until runtime, delegating the instantiation to subclasses.
            - Example: Consider a "Creator" class with an abstract method "factoryMethod." Subclasses of "Creator" implement this method to create specific "Product" objects.

        Abstract Factory:
            - Objective: It provides an interface to create families of related or dependent objects without specifying their concrete classes.
            - Structure: It's built around a super-factory (an abstract factory) that creates other factories. These factories, in turn, produce related objects without specifying their concrete classes.
            - Usage: It's suitable when the system needs to be independent of how its objects are created, composed, and represented.
            - Example: Imagine an abstract factory interface defining methods to create different types of products, and concrete factory classes implementing these methods to produce related sets of products (e.g., a GUI Factory producing different UI components).

        In summary, while both patterns deal with object creation, the Factory Method focuses on creating individual objects through inheritance, allowing subclasses to alter the creation process, while the Abstract Factory concentrates on creating families of related or dependent objects without specifying their concrete classes, providing a way to create entire sets of objects.
*/


// Abstract Factory interface
interface VehicleFactory {
    public function createEngine();
    public function createWheels();
}

// Concrete Factory for creating car components
class CarFactory implements VehicleFactory {
    public function createEngine() {
        return new CarEngine();
    }

    public function createWheels() {
        return new CarWheels();
    }
}

// Concrete Factory for creating bike components
class BikeFactory implements VehicleFactory {
    public function createEngine() {
        return new BikeEngine();
    }

    public function createWheels() {
        return new BikeWheels();
    }
}

// Abstract product classes for engines and wheels
interface Engine {}
interface Wheels {}

// Concrete product classes for car engine and wheels
class CarEngine implements Engine {}
class CarWheels implements Wheels {}

// Concrete product classes for bike engine and wheels
class BikeEngine implements Engine {}
class BikeWheels implements Wheels {}



// Implementation / Client code / Usage:
// For Cars
$carFactory = new CarFactory();
$carEngine = $carFactory->createEngine();
$carWheels = $carFactory->createWheels();

// Similarly, for Bikes
$bikeFactory = new BikeFactory();
$bikeEngine = $bikeFactory->createEngine();
$bikeWheels = $bikeFactory->createWheels();