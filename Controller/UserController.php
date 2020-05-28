<?php

require_once '../Service/UserService.php';
require_once '../Models/User.php';

class UserController 
{
    public function registerUser($name, $code) {
        $newUser = new User();
        $newUser->setName($name);
        $newUser->setCode($code);

        $userService = new UserService($newUser);

        $userService->userValidation('123');

        if(!$userService) {
            return false;
        } else {
            $createUser = new UserRepository($newUser);
            $createUser->register();
            return true;
        }
    } 
}