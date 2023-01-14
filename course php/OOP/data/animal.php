<?php
namespace data;

require_once "food.php";
abstract class Animal
{
    public string $name;
    abstract public function run(): void;
    abstract public function eat(animalFood $animalFood):void;

}
class cat extends Animal
{
    public function run(): void
    {
        echo "Cat $this->name is running". PHP_EOL;
    }
    public function eat(animalFood $animalFood):void
    {
        echo " cat is eating " . PHP_EOL;
    }
}
class dog extends Animal
{
    public function run(): void
    {
        echo "Cat $this->name is running" . PHP_EOL;
    }
    public function eat(Food $animalFood):void
    {
        echo " dog is eating " . PHP_EOL;
    }
}