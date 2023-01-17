<?php
trait sampleTrait
{
    public abstract function sampleFunction(string $name): string;

}
//error
class sampleClass {
    // use sampleTrait;
    // public function sampleFunction(int $name): string
    // {
        
    // }
}