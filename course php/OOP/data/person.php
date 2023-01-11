<?php
class person
{
    const AUTHOR = "daud hidayat ramadhan";
    var string $name;
    var ?string $address = null;
    var string $country = "indonesia";
    function __construct(string $name, ?string $address){
        $this->name = $name;
        $this->address = $address;
    }
    function sayHello(?string $name)
    {
        if(is_null($name)){
            echo "Hi, my name is $this->name". PHP_EOL;

        }else{
            echo "Hi $name , myname is $this->name". PHP_EOL;
        }
    }
    function info (){
        echo "AUTHOR : " . self::AUTHOR . PHP_EOL;
    }
}