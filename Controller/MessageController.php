<?php

require_once '../Service/MessageService.php';
require_once '../Models/Message.php';
require_once '../Models/User.php';

class MessageController 
{
    public function registerMessage() {
        $newMessage = new Message();
        $sender = (addslashes($_POST['sender']));
        $receiver = (addslashes($_POST['receiver']));
        $subject = (addslashes($_POST['subject']));
        $text = (addslashes($_POST['text']));

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