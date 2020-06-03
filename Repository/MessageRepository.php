<?php

class MessageRepository 
{
    public function messageRegister($sender, $receiver, $subject, $text) {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT INTO messages (senderCode, receiverCode, subject, text) VALUES (:sc, :rc, :s, :t)");
        $sql->bindValue(":sc",$sender);
        $sql->bindValue(":rc",$receiver);
        $sql->bindValue(":s",$subject);
        $sql->bindValue(":t",$text);
        $sql->execute();
        return true;
    }

    public function fetchMessage() {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT * FROM messages");
        $sql->execute();
        $dataReturn = $sql->fetchAll();
    }
}