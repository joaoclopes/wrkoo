<?php

require_once '../Service/MessageService.php';
require_once '../Models/Message.php';
require_once '../Models/User.php';

class MessageController 
{
    public function registerMessage() {
        $newMessage = new Message();
        $newMessage->setSender($_POST['sender']);
        $newMessage->setReceiver($_POST['receiver']);
        $newMessage->setSubject($_POST['subject']);
        $newMessage->setText($_POST['text']);

        $messageService = new MessageService();

        if(!$messageService->messageValidation($sender, $receiver, $subject, $text)) {
            return false;
        }

        return true;
    } 

    public function showMessage() {
        $showMessage = new MessageService();
        $showMessage->findMessage();
    }
}