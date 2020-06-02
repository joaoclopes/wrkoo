<?php

class MessageRepository 
{
    public function messageRegister() {
        $connection = DatabaseConnection::getConnection($sender, $receiver, $subject, $text);
        $sql = $connection->prepare("INSERT INTO messages (senderCode, receiverCode, subject, text) VALUES (:sc, :rc, :s, :t)");
        $sql->bindValue(":sc",$sender);
        $sql->bindValue(":rc",$receiver);
        $sql->bindValue(":s",$subject);
        $sql->bindValue(":t",$text);
        $sql->execute();
        return true;
    }

    public function messageConsult() {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT * FROM messages");
        $sql->execute();
        $dataReturn = $sql->fetchAll();
        foreach($dataReturn as $item) {
            echo $item["Mensagem: "];
        }
    }
}