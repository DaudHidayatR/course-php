<?php
require_once __DIR__. ('/vendor/autoload.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger("Daud Hidayat Ramadhan");
$log->pushHandler(new StreamHandler('application.php', Logger::INFO));

$log->info("hello Word");
$log->info("belajar php composer");