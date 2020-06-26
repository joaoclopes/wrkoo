<?php

require_once '../Service/MessageService.php';
require_once '../Models/Message.php';
require_once '../Models/User.php';

class MessageController 
{
    public function registerMessage() {
        $newMessage = new Message();
        $newMessage->setSender(addslashes($_POST['sender']));
        $newMessage->setReceiver(addslashes($_POST['receiver']));
        $newMessage->setSubject(addslashes($_POST['subject']));
        $newMessage->setText(addslashes($_POST['text']));

        $messageService = new MessageService();

        if(!$messageService->messageValidation($newMessage)) {
            return false;
        }

        return true;
    } 

    public function showMessage() {
        $showMessage = new MessageService();
        $showMessage->findMessage();
    }
}