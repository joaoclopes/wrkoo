<?php

require_once('../Models/User.php');
require_once('../Repository/UserRepository.php');

class UserService 
{
    public function userValidation($name, $code) {
        if(!$name || !$code) {
            return false;
        } 

        if(!self::codeValidate($code)) {
            return false;
        } else {
            $createUser = new UserRepository();
            $createUser->register($name, $code);
            return true;
        }

    }

    public static function codeValidate($isValid) {
        $userRepository = new UserRepository();
        
        if(!$userRepository->codeValidate($isValid)) {
            return false;
        }
        return true;
    }
}