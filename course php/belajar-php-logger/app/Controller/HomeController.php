<?php

namespace Daudhidayatramadhan\BelajarPhpLogger\Controller;
use Daudhidayatramadhan\BelajarPhpLogger\App\View;

class HomeController
{
    function index(): void
    {
        $model = [
          "title" => "Belajar PHP MVC",
            "content" => "Selamat Belajar PHP MVC dari Programer Zaman Now"
        ];
        View::render('Home/index',$model);
    }

    function hello(): void
    {
        echo "HomeController.hello()";
    }
    function world(): void
    {
        echo "HomeController.world()";
    }
    function about():void
    {
        echo "AUTHOR Daud Hidayat Ramdahan";
    }
    function login(): void
    {
        $request = [
            "username" => $_POST['username'],
            "password" => $_POST['password']
        ];

        $response = [
            "messege" => "Login Suksses"
        ];
    }
}