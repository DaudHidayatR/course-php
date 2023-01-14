<?php
class Zero
{
    private array $properties = [];
    public function __get($name)
    {

        return $this->properties[$name];
    }
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->properties[$name]);
    }
    public function __unset($name)
    {
        unset($this->properties[$name]);
    }
    public function __call($name,$arguments){
        $join = join(",",$arguments );
        echo "call function $name with arguments: " . $join . PHP_EOL;
    }
    static function __callStatic($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "callstatic function $name with arguments: " . $join . PHP_EOL;
    }

}

$zero = new Zero();

$zero->firstName = "daud";
$zero->middleName = "Hidayat";
$zero->lastName = "Ramadhan";
echo "firstName: " . $zero->firstName.PHP_EOL;
echo "middleName: " . $zero->middleName.PHP_EOL;
echo "lastName: " . $zero->lastName . PHP_EOL;

$zero->sayHello("daud", "hidayat");
$zero::sayHello("daud", "hidayat");