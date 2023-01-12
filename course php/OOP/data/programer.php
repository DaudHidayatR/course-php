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
    if ($programer instanceof backendProgramer){
        echo "Hello Backend programmer $programer->name" . PHP_EOL;
    }else if ($programer instanceof frontendProgramer){
        echo "Hello Frontend programmer $programer->name" . PHP_EOL;

    }else if ($programer instanceof Programer){
        echo "Hello Programer $programer->name" . PHP_EOL;
    }
}