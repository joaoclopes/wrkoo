<?php

require_once('../Models/User.php');
require_once('../Repository/UserRepository.php');

class UserService 
{
    public function validateName($name) {
        if(!$name) {
            return false;
        } 
    }

    public function validateCode($code) {
        if(!$code) {
            return false;
        }

        $userRepository = new UserRepository();
        
        if(!$userRepository->validateUserByCode($code)) {
            return false;
        }
        return true;
    }

    public function createUser() {
        $createUser = new UserRepository();
        $createUser->register($name, $code);
        return true;
    }
}