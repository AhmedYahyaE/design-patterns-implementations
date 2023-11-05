<?php
/* Definition:
    The Strategy design pattern is a behavioral design pattern that defines a family of algorithms, encapsulates each one of them, and makes them interchangeable. It allows a client to choose the appropriate algorithm from a family of algorithms at runtime. This pattern promotes flexibility and ensures that the algorithm selection can vary independently from the clients that use them.
*/

/* Purpose:
    - The Strategy pattern is used when you want to define a set of algorithms and make them interchangeable, allowing the client to choose the algorithm to use at runtime.
    - It helps in avoiding conditional statements and promoting the Open/Closed Principle, as you can add new algorithms without modifying existing code.
    - It separates the algorithm implementation from the client code, making the code more maintainable and testable.
*/

/* Structure:
    1) Context: Maintains a reference to a strategy object and can switch between different strategies. It uses the strategy to perform some operation.
    2) Strategy: Defines the interface for all concrete strategies, declaring a method that the concrete strategies must implement.
    3) ConcreteStrategy: Implements the algorithm defined by the Strategy interface. Each concrete strategy provides a specific implementation of the algorithm.
*/


// Strategy interface
interface PaymentStrategyInterface {
    public function pay();
}


// A Concrete strategy class
class CreditCardPayment implements PaymentStrategyInterface {
    public function pay() {
        echo 'This is Credit Card Payment.<br>';
    }
}

// Another Concrete strategy class
class PayPalPayment implements PaymentStrategyInterface {
    public function pay() {
        echo 'This is PayPal Payment.<br>';
    }
}



// Context class
class ShoppingCart {
    private PaymentStrategyInterface $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategyInterface $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }


    public function makePaymentForShoppingCartItems() {
        $this->paymentStrategy->pay();
    }
}



// Client code
$shoppingCart = new ShoppingCart();

// Now we can swtich payment strategies we want to use very easily (whether PayPal, Credit Card, ...) by passing in a concrete strategy class instance to the setter method

// Using PayPal
$shoppingCart->setPaymentStrategy(new PayPalPayment());
$shoppingCart->makePaymentForShoppingCartItems();

// Using a Credit Card
$shoppingCart->setPaymentStrategy(new CreditCardPayment());
$shoppingCart->makePaymentForShoppingCartItems();