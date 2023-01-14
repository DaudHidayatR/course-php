<?php
namespace Data;
require_once "animal.php";

require_once "food.php";
interface animalShalter {
    function adopt(string $name): Animal;

}
class catShalter implements AnimalShalter
{
    public function adopt(string $name): cat
    {
        $cat = new cat();
        $cat->name = $name;
        return $cat;
    }
    
}
class dogShalter implements AnimalShalter
{
    public function adopt(string $name): dog
    {
        $dog = new dog();
        $dog->name = $name;
        return $dog;
    }
}
