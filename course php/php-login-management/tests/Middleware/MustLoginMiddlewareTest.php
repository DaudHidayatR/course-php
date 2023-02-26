<?php

namespace Daudhidayatramadhan\LoginManagement\App{
    function header(string $value)
    {
        echo $value;
    }
}
namespace Daudhidayatramadhan\LoginManagement\Middleware {

    use Daudhidayatramadhan\LoginManagement\Config\Database;
    use Daudhidayatramadhan\LoginManagement\Domain\Session;
    use Daudhidayatramadhan\LoginManagement\Domain\User;
    use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
    use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
    use Daudhidayatramadhan\LoginManagement\Service\SessionService;
    use PHPUnit\Framework\TestCase;
    class MustLoginMiddlewareTest extends TestCase
    {
        private MustLoginMiddleware $middleware;
        private UserRepository $userRepository;
        private SessionRepository $sessionRepository;
        protected function setUp(): void
        {
            $this->middleware = new MustLoginMiddleware();
            putenv("mode=test");

            $this->userRepository = new UserRepository(Database::getConnection());
            $this->sessionRepository = new SessionRepository(Database::getConnection());

            $this->sessionRepository->deleteAll();
            $this->userRepository->deleteAll();

        }

        public function testBefore()
        {
            $this->middleware->before();
            $this->expectOutputRegex("[Location: /users/login]");
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
            $this->expectOutputString("");

        }
    }
}
