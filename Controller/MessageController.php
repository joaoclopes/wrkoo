<?php

require_once '../Service/MessageService.php';
require_once '../Models/Message.php';
require_once '../Models/User.php';

class UserController 
{
    private $message;

    public function __construct(Message $message) {
        $this->message = $message;
    }

    public function registerMessage(User $sender, User $receiver, $subject, $text) {
        $newMessage = new Message();
        $newMessage->setSender($sender);
        $newMessage->setReceiver($receiver);
        $newMessage->setSubject($subject);
        $newMessage->setText($text);

        $messageService = new MessageService($newMessage);

        $messageService->messageValidation('123');

        if(!$userService) {
            return false;
        } else {
            $createUser = new UserRepository($newUser);
            $createUser->register();
            return true;
        }
    } 
}