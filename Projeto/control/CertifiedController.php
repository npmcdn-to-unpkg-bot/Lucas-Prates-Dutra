<?php

include_once "model/Request.php";
include_once "model/Certified.php";
include_once "database/DbConnector.php";

class CertifiedController
{
    private $requiredParameters = array('tittle', 'description', 'difficult', 'area', 'requirements');

    public function register($request)
    {
        $params = $request->get_params();
        if ($this->isValid($params)) {
            $certified = new Certified($params["tittle"],
                $params["description"],
                $params["difficult"],
                $params["area"],
                $params["requirements"]);

            $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

            $conn = $db->getConnection();

            return $conn->query($this->generateInsertQuery($certified));
        } else
            echo "Error 400: Bad Request";
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

    public function update($request)
    {
        $params = $request->get_params();

        //var_dump($params);

        //$crit = $this->generateCriteriaUpdate($params);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        //Falha: o email não poderá ser trocado
        foreach ($params as $key => $value) {
            $result = $conn->query("UPDATE user SET " . $key . " = " . $value . " WHERE tittle = '" . $params["tittle"] . "'");
        }

        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();


        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();


        $result = $conn->query("DELETE FROM user WHERE tittle = '" . $params["tittle"] . "'");

        return $result;
    }

    private function isValid($parameters)
    {
        $keys = array_keys($parameters);
        $diff1 = array_diff($keys, $this->requiredParameters);
        $diff2 = array_diff($this->requiredParameters, $keys);

        if (empty($diff2) && empty($diff1))
            return true;

        return false;

    }


}