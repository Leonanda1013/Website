<?php
//no 1.4
class CarEncapsulation{
    private $model;
    private $color;

    public function __construct($model, $color){
        $this->model = $model;
        $this->color = $color;
    }

    public function getModel(){
        return $this->model;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }
}

$car1 = new CarEncapsulation("Toyota", "Blue");
echo "Model: " . $car1->getModel() . "<br>"; 
echo "Color: " . $car1->getColor() . "<br>";
$car1->setColor("Red");
echo "updated color: " . $car1->getColor() . "<br>";