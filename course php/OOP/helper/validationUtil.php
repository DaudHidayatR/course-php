<?php
// require_once __DIR__."/exception/validationException.php";
class validateUtil
{
    static function validate(loginRequest $request)
    {
        if (!isset($request->username)) {
            throw new validationException("Username is not set");
        } else if (!isset($request->password)) {
            throw new validationException("Password is not set");
        } else if (is_null($request->password)) {
            throw new validationException("Password is null");
        } else if (is_null($request->password)) {
            throw new validationException("Password is null");
        }
    }
    static function validateReflection($request)
    {
        $relfection = new ReflectionClass($request);
        $Properties = $relfection->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ( $Properties as $key){
            if (!$key->isInitialized($request)){
                throw new ValidationException("$key->name is not set");
            }else if (is_null($key->getValue($request))){
                throw new ValidationException("$key->name is null");
            }
        }
    }
}