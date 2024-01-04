<?php

// Definition: The Singleton design pattern is a creational pattern that ensures a class has only one instance and provides a global point of access to that instance. It's used when you want to restrict the instantiation of a class to a single object.
/*
    Purpose:
        1) Single Instance: To guarantee that a class has only one instance.
        2) Global Access Point: To provide a way to access that instance globally.
*/

/*
    Structure and Components:
        1) Private Constructor: Prevents direct instantiation of the object.
        2) Static Instance Variable: Holds the single instance of the class.
        3) Static Method: Provides a way to access the instance.
*/

/*
    // Benefits:
        1) Controlled Access: Guarantees a single point of access to the instance.
        2) Global Point of Access: Provides a way to access the instance from anywhere in the codebase.
        3) Lazy Initialization: Allows the instance to be created only when needed.

    // Drawbacks:
        1) Global State: Because the instance is globally accessible, it can introduce tight coupling.
        2) Testing Difficulties: Singleton classes can be challenging to test due to their global state.
*/



class Singleton {
    private static $singletonInstance; // Static variable to provide global accessibility (N.B. A static variable is associated with the class rather than with specific instances of the class)

    // Must use a PRIVATE CONSTRUCTOR to prevent direct instantiation of the object!
    private function __construct() {}

    // Static method to provide access to the singleton instance
    public static function getSingletonInstance(): self {
        if (!self::$singletonInstance) {
            self::$singletonInstance = new self();
        }

        return self::$singletonInstance;
    }


    // Example method of the Singleton class
    public function doSomething() {
        echo "Doing something...";
    }
}



// Implementation / Client code / Usage:
$singletonInstance = Singleton::getSingletonInstance();
$singletonInstance->doSomething();

/*
    // You can't instaniate an object DIRECTLY YOURSELF because the class has a PRIVATE constructor!
    $singletonInstance = new Singleton();
    echo '<pre>', var_dump($singletonInstance), '</pre>';
*/