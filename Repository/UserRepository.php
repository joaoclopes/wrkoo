<?php

require_once 'DatabaseRepository.php';

class UserRepository
{
    public function codeValidate($code) {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT user_id FROM users WHERE code = :c");
        $sql->bindValue(":c",$code);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            return true;
        }
    }

    public function register($name, $code) {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT INTO users (name, code) VALUES (:u, :c)");
        $sql->bindValue(":n",$name);
        $sql->bindValue(":c",$code);
        $sql->execute();
        return true;
    }
}