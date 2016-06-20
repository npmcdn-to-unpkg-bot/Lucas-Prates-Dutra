<?php

include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DbConnector.php";

class UserController
{
    private $requiredParameters = array('first_name', 'last_name', 'email', 'phone_number', 'birth_date', 'passwd');

    public function register($request)
    {

        $params = $request->get_params();
        //if ($this->isValid($params)) {
            $user = new User($params["first_name"],
                $params["last_name"],
                $params["email"],
                $params["phone_number"],
                $params["birth_date"],
                $params["passwd"]);

            $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");


            $conn = $db->getConnection();


            return $conn->query($this->generateInsertQuery($user));
        //} else {
        //    echo "Erro 400: Bad Request";
        //}


    }

    private function generateInsertQuery($user)
    {
        $query = "INSERT INTO user (first_name, last_name, email, phone_number, birth_date, passwd)
                  VALUES ('" . $user->getFirstName() . "','" .
            $user->getLastName() . "','" .
            $user->getEmail() . "','" .
            $user->getPhoneNumber() . "','" .
            $user->getBirthDate() . "','" .
            $user->getPassword() . "')";

        return $query;
    }

    public function search($request)
    {
        $params = $request->get_params();

        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT first_name, last_name, email, phone_number, birth_date FROM user WHERE " . $crit);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    private function generateCriteria($params)
    {
        $criteria = "1";
        if (!in_array(null, $params)) {
            $criteria="";
            foreach ($params as $key => $value) {
                $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
            }

            return substr($criteria, 0, -4);
        }

        return $criteria;
    }

    public function update($request)
    {
        $params = $request->get_params();

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        foreach ($params as $key => $value) {
            $result = $conn->query("UPDATE user SET " . $key . " =  '" . $value . "' WHERE email = '" . $params["email"] . "'");
        }

        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("DELETE FROM user WHERE email = '" . $params["email"] . "'");

        return $result;
    }

    private function isValid($parameters)
    {
        $keys = array_keys($parameters);
        $diff1 = array_diff($keys, $this->requiredParameters);
        $diff2 = array_diff($this->requiredParameters, $keys);

        if (empty($diff2) && empty($diff1))

            return false;

    }

}