<?php

class Message 
{
    protected $senderCode;
    protected $receiverCode;
    protected $subject;
    protected $text;

    public function getSenderCode()
    {
        return $this->senderCode;
    }

    public function setSenderCode($senderCode)
    {
        $this->senderCode = $senderCode;

        return $this;
    }

    public function getReceiverCode()
    {
        return $this->receiverCode;
    }

    public function setReceiverCode($receiverCode)
    {
        $this->receiverCode = $receiverCode;

        return $this;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}