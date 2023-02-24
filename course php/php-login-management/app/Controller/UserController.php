<?php

namespace Daudhidayatramadhan\LoginManagement\Controller;

use Daudhidayatramadhan\LoginManagement\App\View;
use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
use Daudhidayatramadhan\LoginManagement\Model\UserLoginRequest;
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
    public  function login()
    {
        View::render('User/login',[
            'title' => 'User login'
        ]);
    }
    public function PostLogin()
    {
        $request = new UserLoginRequest();
        $request->id = $_POST['id'];
        $request->password = $_POST['password'];
        try {
            $this->userService->login($request);
            View::redirect('/');
        }catch (ValidationException $e){
            View::render('User/login',[
                'title' => 'Login User',
                'error' => $e->getMessage()
            ]);
        }
    }
}