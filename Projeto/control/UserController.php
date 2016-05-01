<?php

include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DbConnector.php";

class UserController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new User($params["name"],
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
        $query = "INSERT INTO user (name, last_name, email, phone_number, birth_date, passwd)
                  VALUES ('" . $user->getName() . "','" .
                          $user->getLastName() . "','" .
                          $user->getEmail() . "','" .
                          $user->getPhoneNumber() . "','" .
                          $user->getBirthDate() . "','"  .
                          $user->getPassword() . "')";
        return $query;
    }

}