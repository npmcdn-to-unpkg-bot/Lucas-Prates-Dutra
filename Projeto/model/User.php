<?php


class User
{
    //private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone_number;
    private $birth_date;
    private $password;

    public function __construct($first_name, $last_name, $email, $phone_number, $birth_date, $passwd)
    {
        $this->setFirstName($first_name);
        $this->setLastName($last_name);
        $this->setEmail($email);
        $this->setPhoneNumber($phone_number);
        $this->setBirthDate($birth_date);
        $this->setPassword($passwd);
    }


    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function getPassword()
    {
        return $this->password;
    }

}
