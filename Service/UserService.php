<?php

require_once('../Models/User.php');

class UserService 
{
    public function userValidation($name, $code) {
        if(!$name || !$code) {
            return false;
        } 

        return self::codeValidate($code);
    }

    public static function codeValidate($asdasd) {
        $userRepository = new UserRepository();
        
        if(!$userRepository->codeValidate($asdasd)) {
            return false;
        }

        return true;
    }
}