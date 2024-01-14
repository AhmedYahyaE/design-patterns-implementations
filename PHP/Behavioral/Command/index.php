<?php

// Definition: The Command design pattern is a behavioral pattern that encapsulates a request as an object, allowing for parameterization of clients with different requests, queuing of requests, and logging of the requests. It also provides the ability to undo/redo operations.
// Purpose: The main purpose of the Command pattern is to decouple the sender and receiver of a request. It turns a request into a standalone object that contains all information about the request, including the method call, the method arguments, and the receiving object. This separation allows for more flexibility and extensibility in the codebase.

/*
    Structure and Components:
        1) Command Interface: Declares an interface for executing a particular operation.
        2) Concrete Command: Implements the Command interface and binds a receiver with an action.
        3) Invoker: Asks the command to execute the request. (triggering the command's execution)
        4) Receiver: Knows how to perform the operation associated with a command.
        5) Client: Creates a Concrete Command and associates it with a Receiver.
*/

/*
    // Benefits:
        1) Decoupling: The Command pattern decouples the sender and receiver, promoting a more flexible and extensible design.
        2) Undo/Redo Operations: The encapsulation of commands allows for the implementation of undo and redo operations by storing a history of commands.
        3) Queueing of Requests: Commands can be easily queued and executed in a specific order.
        4) Support for Logging: Commands can be logged for auditing or debugging purposes.

    // Drawbacks:
        1) Increased Number of Classes: Implementing the Command pattern may lead to an increased number of classes, which could be a drawback for small projects.
        2) Complexity: In some cases, the pattern might introduce unnecessary complexity, especially for simple applications.
*/

/*
    Real Use Cases:
        1) GUI Applications: Command pattern is widely used in GUI applications for handling button clicks, menu actions, etc.
        2) File Systems: In file systems, command objects can be used to represent operations like copy, paste, delete, etc.
        3) Transaction Systems: In transactional systems, the Command pattern can be used to represent database operations, allowing for easy undo and redo.
*/


/*
    // Abstract example:

    interface Command {
        public function execute();
    }

    class ConcreteCommand implements Command {
        private $receiver;


        public function __construct(Receiver $receiver) {
            $this->receiver = $receiver;
        }

        public function execute() {
            $this->receiver->action();
        }
    }

    class Receiver {
        public function action() {
            echo 'Receiver executing action.<br>';
        }

        public function anotherAction() {
            echo 'Receiver executing another action.<br>';
        }
    }

    class invoker {
        private $command;


        public function setCommand(Command $command) {
            $this->command = $command;
        }

        public function invoke() {
            $this->command->execute;
        }
    }



    // Implementation / Client code / Usage:
    $receiver = new Receiver();
    $command = new ConcreteCommand($receiver);
    $invoker = new Invoker();
    $invoker->setCommand($command);
    $invoker->invoke();
*/



/************************************************************************************************************************/



// Realistic example:

// Command Interface
interface Command {
    public function execute();
}


// Concrete Commands:
class TurnOnLightsCommand implements Command {
    private $devices; // Receiver

    public function __construct(SmartHomeDevices $devices) {
        $this->devices = $devices;
    }

    public function execute() {
        $this->devices->turnOnLights();
    }
}

class AdjustThermostatCommand implements Command {
    private $devices; // Receiver
    private $temperature;

    public function __construct(SmartHomeDevices $devices, $temperature) {
        $this->devices = $devices;
        $this->temperature = $temperature;
    }

    public function execute() {
        $this->devices->adjustThermostat($this->temperature);
    }
}

class TurnOnTVCommand implements Command {
    private $devices; // Receiver

    public function __construct(SmartHomeDevices $devices) {
        $this->devices = $devices;
    }

    public function execute() {
        $this->devices->turnOnTV();
    }
}


// Receiver
class SmartHomeDevices {
    public function turnOnLights() {
        echo 'Turning on the lights.<br>';
    }

    public function adjustThermostat($temperature) {
        echo 'Adjusting thermostat to {$temperature} degrees.<br>';
    }

    public function turnOnTV() {
        echo 'Turning on the smart TV.<br>';
    }
}


// Invoker
class RemoteControl {
    private $command; // Concrete Command

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function pressButton() {
        $this->command->execute();
    }
}



// Implementation / Client code / Usage:
$smartHomeDevices = new SmartHomeDevices(); // Receiver

$turnOnLightsCommand = new TurnOnLightsCommand($smartHomeDevices); // Concrete Command
$adjustThermostatCommand = new AdjustThermostatCommand($smartHomeDevices, 22); // Concrete Command
$turnOnTVCommand = new TurnOnTVCommand($smartHomeDevices); // Concrete Command


$remoteControl = new RemoteControl(); // Invoker

// Pressing the button to turn on the lights
$remoteControl->setCommand($turnOnLightsCommand);
$remoteControl->pressButton();

// Pressing the button to adjust the thermostat
$remoteControl->setCommand($adjustThermostatCommand);
$remoteControl->pressButton();

// Pressing the button to turn on the TV
$remoteControl->setCommand($turnOnTVCommand);
$remoteControl->pressButton();