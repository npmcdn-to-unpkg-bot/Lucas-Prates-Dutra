<?php


class DatabaseConnector
{

    private $ip;
    private $db_name;
    private $port;
    private $db_type;
    private $user;
    private $password;


    public function __construct($ip, $db_name, $db_type, $port, $user, $passwd)
    {
        $this->ip = $ip;
        $this->db_name = $db_name;
        $this->db_type = $db_type;
        $this->port = $port;
        $this->user = $user;
        $this->password = $passwd;
    }


    public function getConnection()
    {
        $stringPDO = $this->db_type . ":host=" . $this->ip . ";dbname=" . $this->db_name;

        try {
            $connection = new PDO($stringPDO,
                $this->user,
                $this->password);
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $connection;

    }

    /*

    public function getDbName()
    {
        return $this->db_name;
    }

    public function getDbType()
    {
        return $this->db_type;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setDbName($db_name)
    {
        $this->db_name = $db_name;
    }

    public function setDbType($db_type)
    {
        $this->db_type = $db_type;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setPort($port)
    {
        $this->port = $port;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }
    */


}