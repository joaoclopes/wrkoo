<?php

require_once('../Models/User.php');
require_once('../Repository/UserRepository.php');

class UserService 
{
    public function userValidation($name, $code) {
        if(!$this->getName() || !$this->getCode()) {
            return false;
        } 

        if(!self::codeValidate($this->getCode())) {
            return false;
        } else {
            $createUser = new UserRepository();
            $createUser->register();
            return true;
        }

    }

    public static function codeValidate($asdasd) {
        $userRepository = new UserRepository();
        
        if(!$userRepository->codeValidate($asdasd)) {
            return false;
        }

        return true;
    }
}