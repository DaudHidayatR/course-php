<?php

namespace Daudhidayatramadhan\LoginManagement\Controller;
use Daudhidayatramadhan\LoginManagement\App\View;
use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use Daudhidayatramadhan\LoginManagement\Service\SessionService;

class HomeController
{
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function index()
    {
        $user = $this->sessionService->current();
        if ($user == null){
            View::render('Home/index', [
                    "title" => "PHP Login Management"
                ]
            );
        } else {
            View::render('Home/dashboard', [
                    "title" => "Dashboard",
                    "user" => [
                        "name" => $user->name
                    ]
                ]
            );
        }

    }
}