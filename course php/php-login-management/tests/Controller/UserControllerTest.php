<?php

namespace Daudhidayatramadhan\LoginManagement\App{
    function header(string $value)
    {
        echo $value;
    }
}
namespace  Daudhidayatramadhan\LoginManagement\Service{
    function setcookie(string $name, $value) {
        echo "$name: $value";
    }
}

namespace Daudhidayatramadhan\LoginManagement\Controller{
    use Daudhidayatramadhan\LoginManagement\Config\Database;
    use Daudhidayatramadhan\LoginManagement\Domain\Session;
    use Daudhidayatramadhan\LoginManagement\Domain\User;
    use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
    use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
    use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
    use Daudhidayatramadhan\LoginManagement\Service\SessionService;
    use Daudhidayatramadhan\LoginManagement\Service\UserService;
    use PHPUnit\Framework\TestCase;

    class UserControllerTest extends TestCase
    {
        private UserController $userController;
        private SessionRepository $sessionRepository;
        private  UserRepository $userRepository;
        protected function setUp(): void
        {

            $this->userController = new UserController();
            $this->sessionRepository = new SessionRepository(Database::getConnection());
            $this->sessionRepository->deleteAll();
            $this->userRepository = new UserRepository(Database::getConnection());
            $this->userRepository->deleteAll();

            putenv("mode=test");
        }

        public function  testRegister()
        {
            $this->userController->register();
            $this->expectOutputRegex('[Register]');
            $this->expectOutputRegex('[Id]');
            $this->expectOutputRegex('[Name]');
            $this->expectOutputRegex('[Password]');
            $this->expectOutputRegex('[Register new User]');


        }

        public function  testPostRegisterSuccess(){
            $_POST['id'] = 'daud';
            $_POST['name'] = 'daud';
            $_POST['password'] = 'rahasia';
            $this->userController->postRegister();

            $this->expectOutputRegex("[Location: /users/login]");
        }
        public function  testPostRegisterValidationError(){
            $_POST['id'] = '';
            $_POST['name'] = 'daud';
            $_POST['password'] = 'rahasia';

            $this->userController->postRegister();
            $this->expectOutputRegex('[Register]');
            $this->expectOutputRegex('[Id]');
            $this->expectOutputRegex('[Name]');
            $this->expectOutputRegex('[Password]');
            $this->expectOutputRegex('[Register new User]');
            $this->expectOutputRegex('[Id, Name, Password Cannot blank]');

        }
        public function  testPostRegisterDuplicate(){
            $user = new User();
            $user->id = 'daud';
            $user->name = 'daud';
            $user->password = 'rahasia';

            $this->userRepository->save($user);

            $_POST['id'] = 'daud';
            $_POST['name'] = 'daud';
            $_POST['password'] = 'rahasia';

            $this->userController->postRegister();
            $this->expectOutputRegex('[Register]');
            $this->expectOutputRegex('[Id]');
            $this->expectOutputRegex('[Name]');
            $this->expectOutputRegex('[Password]');
            $this->expectOutputRegex('[Register new User]');
            $this->expectOutputRegex('[User already exists]');
        }

        public function testLogin()
        {
            $this->userController->login();

            $this->expectOutputRegex('[Login]');
            $this->expectOutputRegex('[Id]');
            $this->expectOutputRegex('[Password]');
        }
        public function testLoginSuccess()
        {
            $user = new User();
            $user->id = 'daud';
            $user->name = 'daud';
            $user->password = password_hash('rahasia', PASSWORD_BCRYPT);

            $this->userRepository->save($user);
            $_POST['id'] = 'daud';
            $_POST['password'] = 'rahasia';
            $this->userController->postLogin();
            $this->expectOutputRegex("[X-DHR-SESSION: daud]");

            $this->expectOutputRegex('[Location: /]');
        }
        public function testLoginValidationError()
        {
            $_POST['id'] = '';
            $_POST['password'] = '';
            $this->userController->postLogin();

            $this->expectOutputRegex('[Login user]');
            $this->expectOutputRegex('[Id]');
            $this->expectOutputRegex('[Id, Password Cannot blank]');
        }
        public function testLoginUserNotFound()
        {
            $_POST['id'] = 'salah';
            $_POST['password'] = 'salah';
            $this->userController->postLogin();

            $this->expectOutputRegex('[Login user]');
            $this->expectOutputRegex('[Id]');
            $this->expectOutputRegex('[Id or password is wrong]');
        }
        public function testLoginWrongPassword()
        {
            $user = new User();
            $user->id = 'daud';
            $user->name = 'daud';
            $user->password = password_hash('rahasia', PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $_POST['id'] = 'daud';
            $_POST['password'] = 'pass';
            $this->userController->postLogin();

            $this->expectOutputRegex('[Login user]');
            $this->expectOutputRegex('[Id]');
            $this->expectOutputRegex('[Id or password is wrong]');
        }
        public function  testLogout()
        {
            $user = new User();
            $user->id = 'daud';
            $user->name = 'daud';
            $user->password = password_hash('rahasia', PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $session = new Session();
            $session->id = uniqid();
            $session->userId = $user->id;
            $this->sessionRepository->save($session);
            $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

            $this->userController->logout();
            $this-> expectOutputRegex("[Location: /]");
            $this->expectOutputRegex("[X-DHR-SESSION]");


        }
        public function  testUpdateProfile()
        {
            $user = new User();
            $user->id = 'daud';
            $user->name = 'daud';
            $user->password = password_hash('rahasia', PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $session = new Session();
            $session->id = uniqid();
            $session->userId = $user->id;
            $this->sessionRepository->save($session);
            $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;
            $this->userController->updateProfile();
            $this->expectOutputRegex("[Profile]");
            $this->expectOutputRegex("[Id]");
            $this->expectOutputRegex("[daud]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[daud]");

        }
        public function  testUpdateProfileSuccess()
        {
            $user = new User();
            $user->id = 'daud';
            $user->name = 'daud';
            $user->password = password_hash('rahasia', PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $session = new Session();
            $session->id = uniqid();
            $session->userId = $user->id;
            $this->sessionRepository->save($session);
            $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

            $_POST['name'] = "siraj";
            $this->userController->postUpdateProfile();
            $this->expectOutputRegex("[Location: /]");

            $reuslt = $this->userRepository->findById("daud");
            self::assertEquals("siraj", $reuslt->name);
        }
        public function  testUpdateProfileValidationError()
        {
            $user = new User();
            $user->id = 'daud';
            $user->name = 'daud';
            $user->password = password_hash('rahasia', PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $session = new Session();
            $session->id = uniqid();
            $session->userId = $user->id;
            $this->sessionRepository->save($session);
            $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;
            $_POST['name'] = "";
            $this->userController->postUpdateProfile();

            $this->expectOutputRegex("[Profile]");
            $this->expectOutputRegex("[Id]");
            $this->expectOutputRegex("[daud]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[Id, name Cannot blank]");

        }
    }
}
