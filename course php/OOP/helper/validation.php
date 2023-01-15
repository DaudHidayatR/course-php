<?php
function validateLoginRequest(loginRequest $request)
{
    if (!isset($request->username)) {
        throw new validationException("Username is null");
    } else if (!isset($request->password)) {
        throw new validationException("Password is null");
    }else if (trim($request->username) == ""){
        throw new Exception("username is empty");
    }else if(trim($request->password) == ""){
        throw new Exception("password is empty");
    }
}