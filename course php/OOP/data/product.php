<?php
class product
{
    private string $name;
    private int $price;
    function __construct(string $name,int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getPrice(): string
    {
        return $this->price;
    }
}
class productDummy extends Product {
    public function info() {
        echo "Product : " . $this->getName() . PHP_EOL ;
        echo "harga " . $this->getPrice() . PHP_EOL;

    }
}