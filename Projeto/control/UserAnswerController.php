<?php

include_once "model/Request.php";
include_once "model/User_Answer.php";
include_once "database/DbConnector.php";

class UserAnswerController
{
    public function register($request)
    {
        $params = $request->get_params();

        $userAnswer = new User_Answer($params["cod_user"],
            $params["cod_alternatives"]);

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($userAnswer));
    }

    private function generateInsertQuery($question)
    {
        $query = "INSERT INTO user_answer (cod_user, cod_alternatives)
                  VALUES ('" . $question->getCodUser() . "','" .
                               $question->getCodAlternative() . "')";
        return $query;
    }


    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT COUNT(*) as acertou,
                                (SELECT COUNT(*) FROM user_answer) as respondeu FROM user_answer as ua, alternatives as a, correct_alternative as ca
                                WHERE ua.cod_alternatives = a.cod AND ca.cod_alternatives = a.cod AND " . $crit);

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

    public function delete($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();


        $result = $conn->query("DELETE FROM user_answer WHERE " . $crit);

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