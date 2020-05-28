<?php

require_once('../Models/User.php');

class UserService 
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function userValidation() {
        echo $this->user->getName();
        if(!$this->user->getName() || !$this->user->getCode()) {
            return false;
        } 

        $userRepository = new UserRepository($this->user);
        if(!$userRepository->codeValidate()) {
            return false;
        }
        
        return true;
    }
}