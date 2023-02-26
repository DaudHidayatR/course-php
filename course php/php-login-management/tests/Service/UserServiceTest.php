<?php

namespace Daudhidayatramadhan\LoginManagement\Service;

use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Domain\User;
use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
use Daudhidayatramadhan\LoginManagement\Model\UserLoginRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserProfileUpdateRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterRequest;
use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;
    protected function setUp(): void
    {
        $conn = Database::getConnection();
        $this->userRepository = new UserRepository($conn);
        $this->sessionRepository = new SessionRepository($conn);
        $this->userService =new UserService($this->userRepository);

        $this->sessionRepository->deleteAll();
        $this->userRepository->deleteAll();
    }
    public function testRegistrasiSuccess()
    {
        $request = new UserRegisterRequest();
        $request->id = "daud";
        $request->name = "Daud Hidayat Ramadhan";
        $request->password = "daudhidayat";

       $response = $this->userService->register($request);

       self::assertEquals($request->id, $response->user->id);
       self::assertEquals($request->name, $response->user->name);
       self::assertNotEquals($request->password, $response->user->password);
       self::assertTrue(password_verify($request->password, $response->user->password));
    }
    public function testRegisterFailed(){
        $this->expectException(ValidationException::class);

        $request = new UserRegisterRequest();
        $request->id = "";
        $request->name = "";
        $request->password = "";
        $this->userService->register($request);
    }
    public function  testRegisterDuplicate()
    {
        $user = new User();
        $user->id = "daud";
        $user->name = "daud";
        $user->password = "rahasia";
        $this->userRepository->save($user);

        $this->expectException(ValidationException::class);

        $request = new UserRegisterRequest();
        $request->id = "daud";
        $request->name = "Daud Hidayat Ramadhan";
        $request->password = "daudhidayat";

        $this->userService->register($request);
    }
    public function testLoginNotFound()
    {
        $this->expectException(ValidationException::class);

        $request = new UserLoginRequest();
        $request->id = "daud";
        $request->password = "daud";

        $this->userService->login($request);

    }
    public function testLoginWrongPassword()
    {
        $user = new User();
        $user->id = 'daud';
        $user->password = password_hash('daud',PASSWORD_BCRYPT );
        $user->name = 'daud';
        $this->expectException(ValidationException::class);

        $request = new UserLoginRequest();
        $request->id = "daud";
        $request->password = "daud";

        $this->userService->login($request);
    }
    public function testLoginSuccess()
    {
        $user = new User();
        $user->id = "daud";
        $user->password = password_hash("daud",PASSWORD_BCRYPT );
        $user->name = "daud";
        $this->expectException(ValidationException::class);

        $request = new UserLoginRequest();
        $request->id = "daud";
        $request->password = "daud";

        $response= $this->userService->login($request);

        self::assertEquals($request->id, $response->user->id);
        self::assertTrue(password_verify($request->password, $response->user->password));
    }

    public function testUpdateProfileSuccess()
    {
        $user = new User();
        $user->id = "daud";
        $user->password = password_hash("daud",PASSWORD_BCRYPT );
        $user->name = "daud";
        $this->userRepository->save($user);

        $request = new UserProfileUpdateRequest();
        $request->id = "daud";
        $request->name = "siraj";
        $this->userService->updateProfile($request);
        $result = $this->userRepository->findById($user->id);
        self::assertEquals("siraj", $result->name);
    }
    public function testUpdateProfileValidationError()
    {
        $this->expectException(ValidationException::class);
        $request = new UserProfileUpdateRequest();
        $request->id = "";
        $request->name = "";
        $this->userService->updateProfile($request);
    }
    public function testUpdateProfileNotFound()
    {
        $this->expectException(ValidationException::class);
        $request = new UserProfileUpdateRequest();
        $request->id = "siapa";
        $request->name = "siraj";
        $this->userService->updateProfile($request);
    }

}
