<?php

include_once "model/Request.php";
include_once "model/Certified.php";
include_once "database/DbConnector.php";

class CertifiedController
{
    public function register($request)
    {
        $params = $request->get_params();
        $certified = new Certified($params["tittle"],
            $params["description"],
            $params["difficult"],
            $params["area"],
            $params["requirements"]);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($certified));
    }

    private function generateInsertQuery($certified)
    {
        $query = "INSERT INTO certified (tittle, description, difficult, area, requirements)
                  VALUES ('" . $certified->getTittle() . "','" .
                           $certified->getDescription() . "','" .
                           $certified->getDifficult() . "','" .
                           $certified->getArea() . "','" .
                           $certified->getRequirements() . "')";
        return $query;
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT tittle, description, difficult, area, requirements FROM certified WHERE " . $crit);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value)
        {
            $criteria = $criteria.$key . " LIKE '%" . $value . "%' OR ";
        }

        return substr($criteria,0, -4);
    }

}