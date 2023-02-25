<?php

namespace Daudhidayatramadhan\LoginManagement\Service;

use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Domain\Session;
use Daudhidayatramadhan\LoginManagement\Domain\User;
use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

function setcookie(string $name, $value) {
    echo "$name: $value";
}
class SessionServiceTest extends TestCase
{
    private SessionService $sessionService;
    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;
    protected function setUp():void
    {
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->userRepository = new UserRepository(Database::getConnection());
        $this->sessionService = new SessionService($this->sessionRepository, $this->userRepository);

        $this->sessionRepository->deleteAll();
        $this->userRepository->deleteAll();
        $user = new User();
        $user->id = "daud";
        $user->name = "daud";
        $user->password = "daud";
        $this->userRepository->save($user);
    }
    public function testCreate()
    {
        $session = $this->sessionService->create("daud");

        $this->expectOutputRegex("[X-DHR-SESSION: $session->id]");

        $result = $this->sessionRepository->findById($session->id);

        self::assertEquals("daud", $result->userId);
    }
    public function testDestroy()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "daud";
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;
        $this->sessionService->destroy();
        $this->expectOutputRegex("[X-DHR-SESSION: ]");

        $result = $this->sessionRepository->findById($session->id);
        self::assertNull($result);
    }
    public function testCurrent()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "daud";

        $this->sessionRepository->save($session);
        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;
        $user = $this->sessionService->current();
        self::assertEquals($session->userId, $user->id);
    }
}
