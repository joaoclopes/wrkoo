<?php

require_once '../Service/MessageService.php';
require_once '../Models/Message.php';
require_once '../Models/User.php';

class MessageController 
{
    public function registerMessage($sender, $receiver, $subject, $text) {
        $newMessage = new Message();
        $newMessage->setSender($sender);
        $newMessage->setReceiver($receiver);
        $newMessage->setSubject($subject);
        $newMessage->setText($text);

        $messageService = new MessageService();

        if(!$messageService->messageValidation($sender, $receiver, $subject, $text)) {
            return false;
        }

        return true;
    } 

    public function showMessage() {
        $showMessage = new Message();
        $showMessage->messageConsult();
    }
}