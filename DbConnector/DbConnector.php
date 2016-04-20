<?php


class DbConnector
{

    private $ip = "localhost";
    private $db_name = "aula6";
    private $port = "3306";
    private $db_type = "mysql";
    private $user = "root";
    private $password = "";


    public function __construct($db_type, $db_name, $ip, $user, $passwd)
    {
        $this->db_type=$db_type;
        $this->db_name=$db_name;
        $this->ip=$ip;
        $this->user=$user;
        $this->password=$passwd;
    }


    public function get_connection()
    {
        try {
            $conn = new PDO($this->db_type . ':dbname=' . $this->db_name . ';'
                . 'host=' . $this->ip,
                $this->user, $this->password, array(
                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            return $conn;

        } catch (PDOException $e) {
            echo "FAAATALLLL: " . $e->getMessage();
        }

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