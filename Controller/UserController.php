<?php

require_once '../Service/UserService.php';
require_once '../Models/User.php';

class UserController 
{
    public function registerUser() {
        $newUser = new User();
        $name = ($_POST['name']);
        $code = ($_POST['code']);

        $userService = new UserService();
        

        if(!$userService->validateName($name)) {
            return false;
        }

        if(!$userService->validateCode($code)) {
            return false;
        }

        $userService->createUser($name, $code);
        return true;
    }
    
    public function loginUser() {
        $name = ($_POST['name']);
        $code = ($_POST['code']);

        $userService = new UserService();

        if(!$userService->validateName($name) &&
           !$userService->validateCode($code)) {
            return false;
        }

        session_start();
        $_SESSION['code'] = $code;
    }
}