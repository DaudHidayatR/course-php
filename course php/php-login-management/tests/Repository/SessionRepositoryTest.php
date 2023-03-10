<?php

namespace Daudhidayatramadhan\LoginManagement\Repository;

use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Domain\Session;
use Daudhidayatramadhan\LoginManagement\Domain\User;
use PHPUnit\Framework\TestCase;

class SessionRepositoryTest extends TestCase
{
    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;
    protected function setUp(): void
    {
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->userRepository = new UserRepository(Database::getConnection());
        $this->sessionRepository->deleteAll();
        $this->userRepository->deleteAll();
        $user = new User();
        $user->id = 'daud';
        $user->name = 'daud';
        $user->password = 'daud';
        $this->userRepository->save($user);
    }
    public function testSaveSuccess()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "daud";

        $this->sessionRepository->save($session);
        $result = $this->sessionRepository->findById($session->id);
        self::assertEquals($session->id,$result->id);
        self::assertEquals($session->userId, $result->userId);
    }

    public function testDeleteByIdSuccess()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "daud";

        $this->sessionRepository->save($session);
        $result = $this->sessionRepository->findById($session->id);
        self::assertEquals($session->id,$result->id);
        self::assertEquals($session->userId, $result->userId);
        $this->sessionRepository->deleteById($session->id);

        $result = $this->sessionRepository->findById($session->id);
        self::assertNull($result);
    }
    public  function testFindByIdNotFound()
    {
        $result = $this->sessionRepository->findById('Not Found');
        self::assertNull($result);
    }

}
