<?php
require_once __DIR__. '/../vendor/autoload.php';

use Daudhidayatramadhan\BelajarPhpMvc\App\Router;
use Daudhidayatramadhan\BelajarPhpMvc\Controller\HomeController;
use Daudhidayatramadhan\BelajarPhpMvc\Controller\ProductController;
use Daudhidayatramadhan\BelajarPhpMvc\Middleware\AuthMiddleware;

Router::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class,  'categories');
Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello', HomeController::class, 'hello', [AuthMiddleware::class]);
Router::add('GET', '/world', HomeController::class, 'world', [AuthMiddleware::class]);
Router::add('GET', '/about', HomeController::class, 'about', [AuthMiddleware::class]);
Router::run();
