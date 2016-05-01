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
                                         $params["type"],
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

}