<?php

include_once "model/Request.php";
include_once "model/Question.php";
include_once "database/DbConnector.php";

class QuestionController
{
    public function register($request)
    {
        $params = $request->get_params();
        $question = new question($params["enunciation"],
                                         $params["type_question"],
                                         $params["alternatives"]);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($question));
    }

    private function generateInsertQuery($question)
    {
        $query = "INSERT INTO question (enunciation, type, alternatives)
                  VALUES ('" . $question->getEnunciation() . "','" .
            $question->getTypeQuestion() . "','" .
            $question->getAlternatives() . "')";
        return $query;
    }


    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT enunciation, type_question, alternatives FROM question WHERE " . $crit);

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