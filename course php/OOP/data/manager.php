<?php
class manager
{
    var string $name;
    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    function sayHello(string $name): void
    {
        echo "Hi $name , my name is $this->name" . PHP_EOL;
    }
}
class vicePresident extends manager
{
    public function __construct (string $name = ""){
        parent::__construct($name, "Vp");
    }
    function sayHello(string $name): void
    {
        echo "Hi $name , my name is VP $this->name" . PHP_EOL;
    }
}