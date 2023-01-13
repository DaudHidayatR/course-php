<?php

namespace Data\Traits;

trait sayGoodbye
{
    function goodBye(?string $name): void
    {
        if (is_null($name)) {
            echo "goodbye" . PHP_EOL;
        } else {
            echo "good bye $name" . PHP_EOL;
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
trait HasName
{
    public string $name;
}

trait CanRun
{
    public abstract function run(): void;
}
class parentPerson
{
    public function goodBye(?string $name): void
    {
        echo "goodBye in person" . PHP_EOL;
    }
    public function hello(?string $name): void
    {
        echo "hello in person" . PHP_EOL;
    }

}
class person extends parentPerson
{
    use sayGoodbye, sayHello, HasName, CanRun {
        // hello as private;
        // goodBye as private;
    }
    public function run(): void
    {
        echo "person $this->name is running" . PHP_EOL;
    }
}
?>