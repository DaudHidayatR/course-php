<?php
class person
{
    var string $name;
    var ?string $address = null;
    var string $country = "indonesia";
    function sayHello(?string $name)
    {
        if(is_null($name)){
            echo "Hi, my name is $this->name". PHP_EOL;

        }else{
            echo "Hi $name , myname is $this->name". PHP_EOL;
        }
    }
}