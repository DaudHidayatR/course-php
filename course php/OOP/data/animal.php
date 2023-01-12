<?php

namespace data;

abstract class Animal
{
    public string $name;
    abstract public function run(): void;

}
class cat extends Animal
{
    public function run(): void
    {
        echo "Cat $this->name is running". PHP_EOL;
    }
}
class dog extends Animal
{
    public function run(): void
    {
        echo "Cat $this->name is running" . PHP_EOL;
    }
}