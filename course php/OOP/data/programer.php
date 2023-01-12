<?php
class Programer
{
    public string $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
class backendProgramer extends Programer {

}

class frontendProgramer extends Programer {
    
}

class company {
    public programer $programer;
}
function sayHello(programer $programer){
    echo "Hello programmer $programer->name" . PHP_EOL;
}