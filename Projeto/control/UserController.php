<?php

include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DbConnector.php";

class UserController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new User($params["first_name"],
            $params["last_name"],
            $params["email"],
            $params["phone_number"],
            $params["birth_date"],
            $params["password"]);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($user));
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

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT first_name, last_name, email, phone_number, birth_date FROM user WHERE " . $crit);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value)
        {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
        }

        return substr($criteria,0, -4);
    }


}