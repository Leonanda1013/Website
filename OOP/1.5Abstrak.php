<?php
abstract class Shape {
    abstract public function calculateArea();
}

class CircleAbstrak extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);            
    }
}

class RectangleAbstrak extends Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;

    }
}

$circle = new CircleAbstrak(5);
$rectangle = new RectangleAbstrak(4, 6);

echo "Circle Area: " . $circle->calculateArea() . "<br>";
echo "Rectangle Area: " . $rectangle->calculateArea() . "<br>";