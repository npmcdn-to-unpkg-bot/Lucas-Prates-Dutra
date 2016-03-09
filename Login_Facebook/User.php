<?php

class user
{
private $first_name;
private $last_name ;
private $email;
private $password;
private $birth_date;
private $sex;
    public function constructor($first,$last,$mail,$senha,$aniversario,$sexo){
$this->first_name = $first;
$this->last_name = $last;
$this->email = $mail;
$this->password = $senha;
$this->birth_date = $aniversario;
$this->sex = $sexo;
}
}