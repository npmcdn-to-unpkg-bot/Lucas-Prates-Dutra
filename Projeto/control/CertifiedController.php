<?php

include_once "model/Request.php";
include_once "model/Certified.php";
include_once "database/DbConnector.php";

class CertifiedController
{
    public function register($request)
    {
        $params = $request->get_params();
        $certified = new Certified($params["name"],
            $params["description"],
            $params["level"],
            $params["area"],
            $params["requirements"]);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($certified));
    }

    private function generateInsertQuery($certified)
    {
        $query = "INSERT INTO certified (name, description, level, area, requirements)
                  VALUES ('" . $certified->getName() . "','" .
                           $certified->getDescription() . "','" .
                           $certified->getLevel() . "','" .
                           $certified->getArea() . "','" .
                           $certified->getRequirements() . "')";
        return $query;
    }

}