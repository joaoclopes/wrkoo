<?php

require_once('../Models/Message.php');
require_once('../Serive/UserService.php');

 class MessageService
 {
    private $message;

    public function __construct(Message $message) {
        $this->message = $message;
    }

    public function messageValidation() {
        if(
            !$this->message->getSender() ||
            !$this->message->getReceiver() ||
            !$this->message->getSubject() ||
            !$this->message->getText()
        ) {
            echo "Verificar as informações digitadas.";
            return false;
        }

        $userServiceSender = new UserService($this->message->getSender());
        $userServiceReceiver = new UserService($this->message->getReceiver());

        if(!$userServiceSender->codeValidate() && !$userServiceReceiver->codeValidate()) {
            echo "Verificar os códigos digitados.";
            return false;
        }

        if (!$userServiceSender->codeValidate() == !$userServiceReceiver->codeValidate()) {
            return false;
        }

        return true;
    }
 }