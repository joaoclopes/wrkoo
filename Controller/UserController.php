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
        

        if(!$userService->userValidation($name, $code)) {
            return false;
        }
        return true;
    }
    
    public function loginUser() {
        $name = ($_POST['name']);
        $code = ($_POST['code']);

        $userService = new UserService();

        if(!$userService->userValidation($name, $code)) {
            return false;
        }

        session_start();
        $_SESSION['code'] = $code;
    }
}