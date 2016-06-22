<?php

class User_Answer
{
    private $cod_user;
    private $cod_alternative;

    public function __construct($cod_user, $cod_alternative)
    {
        $this->setCodUser($cod_user);
        $this->setCodAlternative($cod_alternative);
    }

    public function setCodUser($cod_user)
    {
        $this->cod_user = $cod_user;
    }

    public function setCodAlternative($cod_alternative)
    {
        $this->cod_alternative = $cod_alternative;
    }

    public function getCodUser()
    {
        return $this->cod_user;
    }

    public function getCodAlternative()
    {
        return $this->cod_alternative;
    }
}