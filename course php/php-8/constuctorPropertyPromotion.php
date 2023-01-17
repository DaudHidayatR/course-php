<?php

use product as GlobalProduct;

class product
{
    // public string $id;
    // public string $name;
    // public int $price;
    // public int $quality;

    public function __construct(
        public string $id,
        public string $name,
        public int $price,
        public int $quality,
        private bool $expensive
    )
    {

    }
}
$product = new Product("1", "daud", 100, 2, true);
var_dump($product);
echo $product->name;