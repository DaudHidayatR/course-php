<?php

interface SayHello {
    function sayHello(): string;
}

enum Gender:string implements SayHello
{
    case Male= "Mr. ";
    case Female = "Mrs. ";


    static function fromIndonesia(string $value): Gender
    {
        return match ($value)
        {
            "Tuan" => Gender::Male,
            "Nyonya" => Gender::Female,
            default => throw  new Exception("Unsupported Indonesia Value")
        };
    }
    function sayHello(): string
    {
        return  "Hello" . $this->value;
    }
    function inIndonesia(): string
    {
        return match ($this){
            Gender::Male => "Tuan",
            Gender::Female => "Nyonya"
        };
    }
}
class Customer {

    public function __construct(public string $id,
                                public string $name,
                                public ?Gender $gender)
    {

    }
}function sayHello(Customer $customer):  string
{
    if ($customer->gender == null ){
        return "Hello". $customer->name;
    }else{
        return "Hello ".$customer->gender->value. $customer->name;
    }
}
$male = "Mr. ";
$user = new Customer("1", "daud", Gender::from($male));
$user2 = new Customer("2", "asista", Gender::Female);

$user2 = new Customer("2", "kipli", Gender::tryFrom("salah"));
var_dump(sayHello($user));
var_dump(sayHello($user2));
var_dump(Gender::cases());

var_dump(Gender::Male->inIndonesia());

var_dump(Gender::formIndonesia("Tuan"));
var_dump(Gender::formIndonesia("Nyonya"));
