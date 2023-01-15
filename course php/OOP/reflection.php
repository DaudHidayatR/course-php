<?php
require_once __DIR__."/exception/validationException.php";
require_once __DIR__."/data/loginRequest.php";
require_once __DIR__."/helper/validationUtil.php";
$request = new loginRequest();
$request->username = "daud";
$request->password = "hidayat";
validateUtil::validateReflection($request);

class registerUSer{
    public ?string $name;
    public ?string $address;
    public ?string $email;
}

$register= new registerUSer();
$register->name = "daud";
$register->address = "daud";
$register->email = "daud";

validateUtil::validateReflection($register);