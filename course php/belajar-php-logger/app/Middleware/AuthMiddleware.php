<?php

namespace Daudhidayatramadhan\BelajarPhpLogger\Middleware;

class AuthMiddleware implements Middleware
{
function before(): void
{
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: /login');
        exit();
    }
}
}