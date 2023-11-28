<?php
/* Definition:
    The Decorator design pattern is a structural pattern used to dynamically add or modify behaviors of objects by wrapping them in one or more decorator classes. It allows the addition of new functionalities to objects without altering their structure.
*/

/* Purpose:
    - Extensibility: Decorators provide a flexible alternative to subclassing for extending functionality.
    - Open-Closed Principle: Objects should be open for extension but closed for modification.
*/

/* Structure:
    1) Component: Defines the interface for objects that can have responsibilities added to them dynamically.
    2) ConcreteComponent: Implements the Component interface and defines the base object to which responsibilities can be added.
    3) Decorator: Implements the Component interface and maintains a reference to a Component object. It also has an interface that mirrors the Component's interface.
    4) ConcreteDecorator: Adds responsibilities to the Component.
*/


// Component Interface (representing a coffee beverage  )
interface Coffee {
    public function getCost(): float;
    public function getDescription(): string;
}

// Concrete Component (a basic implementation of the coffee)
class SimpleCoffee implements Coffee {
    public function getCost(): float {
        return 2.0;
    }

    public function getDescription(): string {
        return "Simple Coffee";
    }
}



// Decorator (N.B. We could use an interface instead too)
abstract class CoffeeDecorator implements Coffee { // Coffee Interface
    protected $decoratedCoffee;

    public function __construct(Coffee $coffee) { // Coffee Interface
        $this->decoratedCoffee = $coffee;
    }

    public function getCost(): float {
        return $this->decoratedCoffee->getCost();
    }

    public function getDescription(): string {
        return $this->decoratedCoffee->getDescription();
    }
}


// Concrete Decorator
class MilkDecorator extends CoffeeDecorator {
    public function getCost(): float {
        return $this->decoratedCoffee->getCost() + 1.0;
    }

    public function getDescription(): string {
        return $this->decoratedCoffee->getDescription() . ", Milk";
    }
}

// Another Concrete Decorator
class WhipDecorator extends CoffeeDecorator {
    public function getCost(): float {
        return $this->decoratedCoffee->getCost() + 0.5;
    }

    public function getDescription(): string {
        return $this->decoratedCoffee->getDescription() . ", Whip";
    }
}

// In this example, you can see how the decorators (MilkDecorator and WhipDecorator) add functionality (cost and description) to the base coffee object (SimpleCoffee) without directly modifying it. This allows us to add or remove functionalities dynamically and in a flexible way.


// Implementation (Client code):
// Creating a simple coffee
$simpleCoffee = new SimpleCoffee();
echo $simpleCoffee->getDescription() . " $" . $simpleCoffee->getCost() . "\n";

// Adding decorators
$milkCoffee = new MilkDecorator($simpleCoffee); // Passing in the Concrete Component to the Concrete Decorator constructor function
echo $milkCoffee->getDescription() . " $" . $milkCoffee->getCost() . "\n";

$whipMilkCoffee = new WhipDecorator($milkCoffee); // Passing in the Concrete Component to the Concrete Decorator constructor function
echo $whipMilkCoffee->getDescription() . " $" . $whipMilkCoffee->getCost() . "\n";