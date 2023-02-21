<?php
require_once __DIR__. '/../vendor/autoload.php';

use Daudhidayatramadhan\LoginManagement\App\Router;
use Daudhidayatramadhan\LoginManagement\Controller\HomeController;

Router::add('GET', '/', HomeController::class, 'index');

Router::run();
