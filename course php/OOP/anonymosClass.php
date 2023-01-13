<?php
interface HelloWord
{
    function sayHello(): void;
}

$helloword = new class("daud") implements HelloWord{
    public string $name;

    public function __construct(String $name){
        $this->name = $name;
    }
    
        
    function sayHello(): void{
        echo "hello wold" . PHP_EOL;
    }
};
$helloword->sayHello();

?>