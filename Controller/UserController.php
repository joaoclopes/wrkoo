<?php

require_once '../Service/UserService.php';
require_once '../Models/User.php';

class UserController 
{
    public function registerUser($name, $code) {
        $newUser = new User();
        $newUser->setName($name);
        $newUser->setCode($code);

        $userService = new UserService();

        if(!$userService->userValidation($name, $code)) {
            return false;
        }
        return true;
    } 
}