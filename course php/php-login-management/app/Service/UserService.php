<?php

namespace Daudhidayatramadhan\LoginManagement\Service;


use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Domain\User;
use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
use Daudhidayatramadhan\LoginManagement\Model\UserLoginRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserLoginResponse;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterResponse;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserRegisterRequest $request): UserRegisterResponse
    {
        $this->validationUserRegistrationRequest($request);

        try{
            Database::beginTransaction();
            $user = $this->userRepository->findById($request->id);
            if ($user != null){
                throw new ValidationException("User already exists");
            }
            $user = new User();
            $user->id = $request->id;
            $user->name = $request->name;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $response = new UserRegisterResponse();
            $response->user = $user;
            Database::commitTransaction();
            return  $response;

        }catch (\Exception $e){
            Database::rollbackTransaction();
            throw $e;
        }

    }
    private function  validationUserRegistrationRequest(UserRegisterRequest $request)
    {
        if($request->id == null || $request->name == null || $request->password == null ||
            trim($request->id )== "" || trim($request->password )== "" || trim($request->name)== ""){
            throw  new ValidationException('Id, Name, Password Cannot blank');

        }
    }
    public function login (UserLoginRequest $request): UserLoginResponse
    {
    $this->validationUserLoginRequest($request);
    $user = $this->userRepository->findById($request->id);
            if ($user == null){
                throw new ValidationException("Id or password is wrong");
            }
            if(password_verify($request->password, $user->password)){
                $response = new UserLoginResponse();
                $response->user = $user;
                return $response;
            }else{
                throw new ValidationException("Id or password is wrong");
            }
    }
    private function validationUserLoginRequest(UserRegisterRequest $request)
    {
        if($request->id == null ||  $request->password == null ||
            trim($request->id )== "" || trim($request->password )== "" ){
            throw  new ValidationException('Id, Password Cannot blank');

        }
    }
}