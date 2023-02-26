<?php

namespace Daudhidayatramadhan\LoginManagement\Controller;

use Daudhidayatramadhan\LoginManagement\App\View;
use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
use Daudhidayatramadhan\LoginManagement\Model\UserLoginRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserProfileUpdateRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterRequest;
use Daudhidayatramadhan\LoginManagement\Repository\SessionRepository;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use Daudhidayatramadhan\LoginManagement\Service\SessionService;
use Daudhidayatramadhan\LoginManagement\Service\UserService;

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
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
            $response= $this->userService->login($request);

            $this->sessionService->create($response->user->id);
            View::redirect('/');
        }catch (ValidationException $e){
            View::render('User/login',[
                'title' => 'Login User',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function logout()
    {
    $this->sessionService->destroy();
    View::redirect("/");
    }
    public function updateProfile()
    {
        $user = $this->sessionService->current();
        View::render("User/profile", [
            "title" => "Update user profile",
            "user" => [
                "id"=> $user->id,
                "name"=> $user->name
                ]

        ]);
    }
    public function postUpdateProfile()
    {
        $user = $this->sessionService->current();

        $request = new UserProfileUpdateRequest();
        $request->id = $user->id;
        $request->name = $_POST['name'];

        try {
            $this->userService->updateProfile($request);
            View::redirect('/');
        }catch (ValidationException $e){
            View::render("User/profile",[
                'title' => 'Update user profile',
                'error' => $e->getMessage(),
                "user" => [
                    "id"=> $user->id,
                    "name"=> $_POST['name']
                ]
            ]);
        }
    }
}