<?php

namespace Daudhidayatramadhan\LoginManagement\Middleware;

use Daudhidayatramadhan\LoginManagement\Middleware\Middleware;
use Daudhidayatramadhan\LoginManagement\App\View;
use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use Daudhidayatramadhan\LoginManagement\Service\SessionService;

class MustNotLoginMiddleware implements Middleware
{
    private SessionService $sessionService;


    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $userRepository = new UserRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function before(): void
    {
    $user = $this->sessionService->current();
    if($user != null){
        View::redirect('/');
        }
    }
}