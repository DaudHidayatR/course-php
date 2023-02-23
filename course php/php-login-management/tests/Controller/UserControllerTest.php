<?php

namespace Daudhidayatramadhan\LoginManagement\App{
    function header(string $value)
    {
        echo $value;
    }
}




namespace Daudhidayatramadhan\LoginManagement\Controller{
    use Daudhidayatramadhan\LoginManagement\Config\Database;
    use Daudhidayatramadhan\LoginManagement\Domain\User;
    use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
    use Daudhidayatramadhan\LoginManagement\Service\UserService;
    use PHPUnit\Framework\TestCase;
    class UserControllerTest extends TestCase
    {
        private UserController $userController;
        private  UserRepository $userRepository;
        protected function setUp(): void
        {
            $this->userController = new UserController();
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
    }

}
