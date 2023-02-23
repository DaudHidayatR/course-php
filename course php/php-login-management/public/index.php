<?php
require_once __DIR__. '/../vendor/autoload.php';

use Daudhidayatramadhan\LoginManagement\App\Router;
use Daudhidayatramadhan\LoginManagement\Controller\HomeController;
use Daudhidayatramadhan\LoginManagement\Controller\UserController;
use \Daudhidayatramadhan\LoginManagement\Config\Database;


Database::getConnection('prod');

//home Controller
Router::add('GET', '/', HomeController::class, 'index', []);

//user Controller
Router::add('GET', '/users/register', UserController::class, 'register', []);
Router::add('POST', '/users/register', UserController::class, 'postRegister', []);


Router::run();
