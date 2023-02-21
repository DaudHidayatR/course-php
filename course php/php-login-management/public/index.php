<?php
require_once __DIR__. '/../vendor/autoload.php';

use Daudhidayatramadhan\LoginManagement\App\Router;
use Daudhidayatramadhan\LoginManagement\Controller\HomeController;
use Daudhidayatramadhan\LoginManagement\Controller\ProductController;
use Daudhidayatramadhan\LoginManagement\Middleware\AuthMiddleware;

Router::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class,  'categories');
Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello', HomeController::class, 'hello', [AuthMiddleware::class]);
Router::add('GET', '/world', HomeController::class, 'world', [AuthMiddleware::class]);
Router::add('GET', '/about', HomeController::class, 'about', [AuthMiddleware::class]);
Router::run();
