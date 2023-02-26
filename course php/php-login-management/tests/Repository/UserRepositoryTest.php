<?php

namespace Daudhidayatramadhan\LoginManagement\Repository;

use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Domain\User;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private UserRepository $repository;
    private  SessionRepository $sessionRepository;

    protected function setUp(): void
    {
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->repository = new  UserRepository(Database::getConnection());
        $this->sessionRepository->deleteAll();
        $this->repository->deleteAll();

    }
    public  function testSaveSuccess()
    {
    $user = new User();
    $user->id = '1';
    $user->name = 'daud';
    $user->password = 'daudhidayatramadhan';

    $this->repository->save($user);
    $result = $this->repository->findById($user->id);

    self::assertEquals($user->id, $result->id);
    self::assertEquals($user->name, $result->name);
    self::assertEquals($user->password, $result->password);

    }
    public function testFindByIdNotFound()
    {
        $user = $this->repository->findById("notFound");
        self::assertNull($user);
    }
    public function testUpdate()
    {
        $user = new User();
        $user->id = '1';
        $user->name = 'daud';
        $user->password = 'daudhidayatramadhan';

        $this->repository->save($user);
        $user->name = "budi";
        $this->repository->update($user);

        $result = $this->repository->findById($user->id);

        self::assertEquals($user->id, $result->id);
        self::assertEquals($user->name, $result->name);
        self::assertEquals($user->password, $result->password);

    }
}
