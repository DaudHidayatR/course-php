<?php
require_once __DIR__. '/../vendor/autoload.php';

use Daudhidayatramadhan\LoginManagement\App\Router;
use Daudhidayatramadhan\LoginManagement\Controller\HomeController;
use Daudhidayatramadhan\LoginManagement\Controller\UserController;
use \Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Middleware\MustNotLoginMiddleware;
use Daudhidayatramadhan\LoginManagement\Middleware\MustLoginMiddleware;


Database::getConnection('prod');

//home Controller
Router::add('GET', '/', HomeController::class, 'index', []);

//user Controller
Router::add('GET', '/users/register', UserController::class, 'register', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', UserController::class, 'postRegister', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/login', UserController::class, 'login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login', UserController::class, 'postLogin', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/logout', UserController::class, 'logout', [MustLoginMiddleware::class]);
Router::add('GET', '/users/profile', UserController::class, 'updateProfile', [MustLoginMiddleware::class]);
Router::add('POST', '/users/profile', UserController::class, 'postUpdateProfile', [MustLoginMiddleware::class]);







Router::run();
