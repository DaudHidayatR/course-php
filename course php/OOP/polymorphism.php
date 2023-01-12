<?php
require_once __DIR__ . '/data/programer.php';
$company = new Company ();
$company->programer =  new Programer ("daud");
$company->programer = new backendProgramer("juan");
$company->programer = new frontendProgramer("siraj");

sayhello(new Programer("daud"));
sayhello(new backendProgramer("juan"));
sayhello(new frontendProgramer("siraj"));