<?php
// Structure: Context, Strategy, and Concrete Strategy



// Strategy interface
interface PaymentStrategyInterface {
    public function pay();
}


// A Concrete strategy class
class CreditCardPayment implements PaymentStrategyInterface {
    public function pay() {
        echo 'This is Credit Card Payment.';
    }
}

// Another Concrete strategy class
class PayPalPayment implements PaymentStrategyInterface {
    public function pay() {
        echo 'This is PayPal Payment.';
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

// Now we can swtich payment strategies we want to use very easily (wheter PayPal, Credit Card, ...) by passing in a concrete strategy class instance to the setter method
$shoppingCart->setPaymentStrategy(new PayPalPayment());
// $shoppingCart->setPaymentStrategy(new CreditCardPayment());

$shoppingCart->makePaymentForShoppingCartItems();