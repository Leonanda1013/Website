<?php
interface Shape{
    public function calculateArea();
}

interface Color{
    public function getColor();
}

class CircleInterface implements Shape, Color{

    private $radius;
    private $color;

    public function __construct($radius, $color){
        $this->radius = $radius;
        $this->color = $color;
    }


    public function calculateArea(){
        return pi() * pow($this->radius, 2);
    }
    public function getColor(){
        return $this->color;
    }
}

$circle = new CircleInterface(5, "Blue");
echo "Area of circle: " . $circle->calculateArea() . "<br>";
echo "Color of circle: " . $circle->getColor() . "<br>";