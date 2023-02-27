<?php

namespace Daudhidayatramadhan\LoginManagement\Middleware {
    require_once __DIR__."/../Helper/helper.php";
    use Daudhidayatramadhan\LoginManagement\Config\Database;
    use Daudhidayatramadhan\LoginManagement\Domain\Session;
    use Daudhidayatramadhan\LoginManagement\Domain\User;
    use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
    use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
    use Daudhidayatramadhan\LoginManagement\Service\SessionService;
    use PHPUnit\Framework\TestCase;
    class MustNotLoginMiddlewareTest extends TestCase
    {
        private MustNotLoginMiddleware $middleware;
        private UserRepository $userRepository;
        private SessionRepository $sessionRepository;
        protected function setUp(): void
        {
            $this->middleware = new MustNotLoginMiddleware();
            putenv("mode=test");

            $this->userRepository = new UserRepository(Database::getConnection());
            $this->sessionRepository = new SessionRepository(Database::getConnection());

            $this->sessionRepository->deleteAll();
            $this->userRepository->deleteAll();

        }

        public function testBefore()
        {
            $this->middleware->before();
            $this->expectOutputString("");

;
        }
        public function testBeforeLoginUser()
        {
            $user = new User();
            $user->id = "daud";
            $user->name = "daud";
            $user->password = password_hash("daud", PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $session = new Session();
            $session->id = uniqid();
            $session->userId = $user->id;
            $this->sessionRepository->save($session);

            $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

            $this->middleware->before();
            $this->expectOutputRegex("[Location: /]");
        }
    }
}
