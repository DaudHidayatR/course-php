<?php

namespace Daudhidayatramadhan\LoginManagement\Controller;
use Daudhidayatramadhan\LoginManagement\App\View;

class HomeController
{
    function index(): void
    {
    View::render('home/index', [
        "title" => "PHP Login Management"
        ]
    );
    }
}