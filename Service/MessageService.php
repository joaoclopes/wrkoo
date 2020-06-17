<?php

require_once '../Models/Message.php';
require_once '../Serive/UserService.php';

class MessageService
{
    public function messageValidation($sender, $receiver, $subject, $text)
    {
        if (!$sender || !$receiver || !$subject || !$text) {
            return false;
        }

        $validUser = new UserService();

        if (!$validUser->codeValidate($sender) && !$validUser->codeValidate($receiver)) {
            return false;
        }

        if ($sender == $receiver) {
            return false;
        }

        return true;
    }

    public function findMessage() 
    {
        $newFindMessage = new MessageRepository();
        $newFindMessage->fetchMessage();
    }
}
