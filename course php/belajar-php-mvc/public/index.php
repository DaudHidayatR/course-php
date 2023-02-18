<?php
require_once __DIR__. '/../vendor/autoload.php';

use Daudhidayatramadhan\BelajarPhpMvc\App\Router;

Router::add('GET', '/', 'HomeController', 'index');
Router::add('GET', '/login', 'UseController', 'login');
Router::add('GET', '/register', 'UseController', 'register');
Router::run();