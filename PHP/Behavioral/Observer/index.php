<?php
/* Definition:
    The Observer design pattern is a behavioral pattern that establishes a one-to-many dependency between objects. It defines a subscription mechanism where one object (the subject) maintains a list of dependents (observers) and notifies them of any state changes, ensuring that all observers are updated automatically when the subject's state changes.
*/

/* Purpose:
    The Observer pattern aims to achieve a loosely coupled system where changes in one object can trigger updates in multiple dependent objects without tightly coupling them together. This pattern is useful when you have a scenario where multiple objects need to be updated when the state of another object changes.
*/

/* Structure:
    1) Subject: Maintains a list of observers and provides methods to subscribe, unsubscribe, and notify observers of changes.
    2) Observer: Defines an interface that concrete observers implement. This interface typically includes an update method, which the subject calls to notify observers of changes.
    3) ConcreteSubject: Implements the subject interface. It tracks its observers and notifies them when its state changes.
    4) ConcreteObserver: Implements the observer interface and defines the specific actions to take when notified by the subject.
*/


// Example: Let's consider an example of a news publisher and subscribers who receive notifications when a new article is published:

// Subject interface
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// Observer Interface
interface Observer {
    public function update(string $article);
}


// ConcreteSubject (NewsPublisher):
class NewsPublisher implements Subject {
    private $observers = [];
    private $latestArticle;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->latestArticle);
        }
    }

    public function publishArticle(string $article) {
        $this->latestArticle = $article;
        $this->notify();
    }
}

// ConcreteObserver (Subscriber):
class Subscriber implements Observer {
    private $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function update(string $article) {
        echo "Hey {$this->name}, a new article is published: '{$article}'\n";
    }
}


// Implementation (Client code):
$newsPublisher = new NewsPublisher();

$subscriber1 = new Subscriber("Alice");
$subscriber2 = new Subscriber("Bob");

$newsPublisher->attach($subscriber1);
$newsPublisher->attach($subscriber2);

$newsPublisher->publishArticle("Introduction to Design Patterns");