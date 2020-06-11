<?php

require_once '../Service/MessageService.php';
require_once '../Models/Message.php';
require_once '../Models/User.php';

$registerMessage = new MessageController();

$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$subject = $_POST['subject'];
$text = $_POST['text'];

$regiterUser->registerMessage($sender, $receiver, $subject, $text);

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
        $showMessage = new MessageService();
        $showMessage->findMessage();
    }
}