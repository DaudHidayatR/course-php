<?php

namespace Daudhidayatramadhan\BelajarPhpUnitTest;

class Product
{
    private string $id, $name, $description;
    private int $price, $quantity;

//    public function __construct(string $id, string $name, string $description, int $price, int $quantity)
//    {
//        $this->id = $id;
//        $this->name = $name;
//        $this->description = $description;
//        $this->price = $price;
//        $this->quantity = $quantity;
//    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}