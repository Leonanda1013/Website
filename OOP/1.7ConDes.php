<?php
class CarConDes {
    private $brand;

    public function __construct($brand) {
        echo "A new car has been created.<br>";
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function __destruct() {
        echo "The car has been destroyed.<br>";
    }
}

$car = new CarConDes("Toyota");

echo "Brand: " . $car->getBrand() . "<br>";