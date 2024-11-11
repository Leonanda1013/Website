
<?php
//no 1.2
class Animal {
    protected $name;

    public function __construct($name){
    $this->name = $name;
    }

    public function eat(){
        echo $this->name . " is eating.<br>";
    }
    public function sleep(){
        echo $this->name . " is sleeping.<br>";
    }
    
}

class Cat extends Animal{
    public function meow(){
        echo $this->name . " says meowing!<br>";
    }
}

class Dog extends Animal{
    public function bark(){
        echo $this->name . " says woof!<br>";
    }
}

$cat1 = new Cat("Whishkers");
$dog1 = new Dog("Buddy");

$cat1->eat();
$dog1->sleep();

$cat1->meow();
$dog1->bark();
