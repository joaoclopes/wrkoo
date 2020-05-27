<?php

class MessageRepository 
{
    public function messageRegister($senderCode, $receiverCode, $subject, $text) {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT INTO messages (senderCode, receiverCode, subject, text) VALUES (:sc, :rc, :s, :t)");
        $sql->bindValue(":sc",$senderCode);
        $sql->bindValue(":rc",$receiverCode);
        $sql->bindValue(":s",$subject);
        $sql->bindValue(":t",$text);
        $sql->execute();
        return true;
    }

    public function showMessage() {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT * FROM messages");
        $sql->execute();
        $dataReturn = $sql->fetchAll();
        foreach($dataReturn as $item) {
            echo $item["Mensagem: "];
        }
    }
}