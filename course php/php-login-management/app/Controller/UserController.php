<?php

namespace Daudhidayatramadhan\LoginManagement\Controller;

use Daudhidayatramadhan\LoginManagement\App\View;
use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterRequest;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use Daudhidayatramadhan\LoginManagement\Service\UserService;

class UserController
{
    private UserService $userService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);
    }

    public function register(){
        View::render('User/register',[
            'title' => 'Register new User'
        ]);
    }
    public function  postRegister(){
        $request = new UserRegisterRequest();
        $request->id = $_POST['id'];
        $request->name = $_POST['name'];
        $request->password = $_POST['password'];
        try {
            $this->userService->register($request);
            View::redirect('/users/login');
        }catch (ValidationException $e){
            //redirect login/register
            View::render('User/register',[
                'title' => 'Register new User',
                'error' => $e->getMessage()
            ]);
        }


    }
}