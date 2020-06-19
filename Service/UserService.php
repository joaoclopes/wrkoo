<?php

require_once('../Models/User.php');
require_once('../Repository/UserRepository.php');

class UserService 
{
    public function userValidation($name, $code) {
        if(!$name || !$code) {
            return false;
        } 

        if(!$this->codeValidate($code)) {
            return false;
        } else {
            $createUser = new UserRepository();
            $createUser->register($name, $code);
            return true;
        }

    }

    public function codeValidate($code) {
        $userRepository = new UserRepository();
        
        if(!$userRepository->codeValidate($code)) {
            return false;
        }
        return true;
    }
}