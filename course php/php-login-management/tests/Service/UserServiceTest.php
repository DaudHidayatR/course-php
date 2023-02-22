<?php

namespace Daudhidayatramadhan\LoginManagement\Service;

use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Domain\User;
use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterRequest;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    private UserRepository $userRepository;
    protected function setUp(): void
    {
        $conn = Database::getConnection();
        $this->userRepository = new UserRepository($conn);
        $this->userService =new UserService($this->userRepository);

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
}
