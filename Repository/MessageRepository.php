<?php

class MessageRepository 
{
    private $message;

    public function __construct(Message $message) {
        $this->message = $message;
    }

    public function messageRegister() {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT INTO messages (senderCode, receiverCode, subject, text) VALUES (:sc, :rc, :s, :t)");
        $sql->bindValue(":sc",$this->message->getSenderCode());
        $sql->bindValue(":rc",$this->message->getReceiverCode());
        $sql->bindValue(":s",$this->message->getSubject());
        $sql->bindValue(":t",$this->message->getText());
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