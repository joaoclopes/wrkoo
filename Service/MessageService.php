<?php

require_once '../Models/Message.php';
require_once 'UserService.php';

class MessageService
{
    public function messageValidation(Message $message)
    {
        if (!$this->message->getSender()   || 
            !$this->message->getReceiver() || 
            !$this->message->getSubject()  || 
            !$this->message->getText()) {
            return false;
        }

        $userService = new UserService();

        if (!$userService->validateCode($this->message->getSender()) && 
            !$userService->validateCode($this->message->getReceiver())) {
            return false;
        }

        if ($this->message->getSender() == 
            $this->message->getReceiver()) {
            return false;
        }

        return true;
    }

    public function findMessage() 
    {
        $messageRepository = new MessageRepository();
        $messageRepository->fetchMessage();
    }
}
