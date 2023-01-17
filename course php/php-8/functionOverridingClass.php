<?php
class parentClass
{
    public function method(string $name){

    }
}
//error
class ChildClass extends parentClass {
    // public function method(int $name)
    // {
    // }
}