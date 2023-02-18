<?php
$path = '/index';
if ((isset($_SERVER['PATH_INFO']))){
    $path = $_SERVER['PATH_INFO'];
}
require  __DIR__.'/../app/view'. $path .'.php';