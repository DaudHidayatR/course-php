<?php

namespace Daudhidayatramadhan\LoginManagement\Service;


use Daudhidayatramadhan\LoginManagement\Config\Database;
use Daudhidayatramadhan\LoginManagement\Domain\User;
use Daudhidayatramadhan\LoginManagement\Exception\ValidationException;
use Daudhidayatramadhan\LoginManagement\Model\UserLoginRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserLoginResponse;
use Daudhidayatramadhan\LoginManagement\Model\UserProfileUpdateRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserProfileUpdateResponse;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserRegisterResponse;
use Daudhidayatramadhan\LoginManagement\Model\UserUpdatePasswordRequest;
use Daudhidayatramadhan\LoginManagement\Model\UserUpdatePasswordResponse;
use Daudhidayatramadhan\LoginManagement\Repository\UserRepository;
use PHPUnit\Exception;

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
    private function validationUserLoginRequest(UserLoginRequest $request)
    {
        if($request->id == null ||  $request->password == null ||
            trim($request->id )== "" || trim($request->password )== "" ){
            throw  new ValidationException('Id, Password Cannot blank');

        }
    }
    public function updateProfile(UserProfileUpdateRequest $request): UserProfileUpdateResponse
    {
        $this->validationUpdateProfile($request);
        try {
            Database::beginTransaction();
            $user = $this->userRepository->findById($request->id);

            if ($user == null)
            {
                throw new ValidationException("User is not found");
            }
            $user->name = $request->name;
            $this->userRepository->update($user);
            Database::commitTransaction();

            $response = new UserProfileUpdateResponse();
            $response->user = $user;
            return $response;
        }catch (\Exception $e){
            Database::rollbackTransaction();
            throw $e;
        }
    }
    private function validationUpdateProfile(UserProfileUpdateRequest $request)
    {
        if($request->id == null ||  $request->name == null ||
            trim($request->id )== "" || trim($request->name )== "" ){
            throw  new ValidationException('Id, name Cannot blank');

        }
    }
    public function updatePassword(UserUpdatePasswordRequest $request): UserUpdatePasswordResponse
    {
        $this->validationUserPasswordUpdateRequest($request);
        try {
            Database::beginTransaction();
            $user = $this->userRepository->findById($request->id);

            if ($user == null){
                throw new ValidationException("User not found");
            }
            if (!password_verify($request->oldPassword, $user->password)){
                throw new ValidationException("OLd Password is wrong");
            }
            $user->password = password_hash($request->newPassword, PASSWORD_BCRYPT);
            $this->userRepository->update($user);

            Database::commitTransaction();
            $response = new UserUpdatePasswordResponse();
            $response->user = $user;
            return$response;
        }catch (\Exception $e){
            Database::rollbackTransaction();
            throw $e;
        }
    }
    private  function  validationUserPasswordUpdateRequest(UserUpdatePasswordRequest $request)
    {
        if($request->id == null ||  $request->oldPassword == null || $request->newPassword == null||
            trim($request->id )== "" || trim($request->oldPassword )== ""||trim($request->newPassword )== "" ){
            throw  new ValidationException('Id, old password, new password Cannot blank');
        }
    }
}