<?php

class UserRepository
{

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function codeValidate() {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT user_id FROM users WHERE code = :c");
        $sql->bindValue(":c",$this->user->getCode());
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            return true;
        }
    }

    public function register() {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT INTO users (name, code) VALUES (:u, :c)");
        $sql->bindValue(":n",$this->user->getName());
        $sql->bindValue(":c",$this->user->getCode());
        $sql->execute();
        return true;
    }
}