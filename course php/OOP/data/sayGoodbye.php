<?php

namespace Data\Traits;
trait sayGoodbye
{
    function goodBye(?string $name): void
    {
        if(is_null($name)){
            echo "goodbye".PHP_EOL;
        }else {
            echo "good bye $name".PHP_EOL;
        }
    }
}

trait sayHello
{
    function hello(?string $name): void
    {
        if (is_null($name)) {
            echo "hello" . PHP_EOL;
        } else {
            echo "hello $name" . PHP_EOL;
        }
    }
}
trait HasName {
    public string $name;
}
class person 
{
    use sayGoodbye, sayHello, HasName;
}
?>