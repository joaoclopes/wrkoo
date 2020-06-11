<?php

class User 
{
    private $name;
    private $code;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($Code)
    {
        $this->Code = $code;

        return $this;
    }
}