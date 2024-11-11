<?php
// no 1.3
interface Shape{
    public function calculateArea();
}

class Circle implements Shape{
    private $radius;

    public function __construct($radius){
        $this->radius = $radius;
    }

    public function calculateArea(){
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle implements Shape{
    private $width;
    private $heigth;

    public function __construct($width, $heigth){
        $this->width = $width;
        $this->heigth = $heigth;

    }

    public function calculateArea(){
        return $this->width * $this->heigth;
    }
}

function printArea(Shape $shape){
    echo "Area: " . $shape->calculateArea() . "<br>";
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

printArea($circle);
printArea($rectangle);

