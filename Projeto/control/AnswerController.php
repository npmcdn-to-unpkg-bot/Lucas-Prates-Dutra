<?php

class AnswerController
{
    public function search($request)
    {
        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT al.cod_question, al.description as 'respondeu',
                                (SELECT a.description FROM alternatives as a, correct_alternative as ca WHERE ca.cod_alternatives = a.cod AND a.cod_question = al.cod_question) as 'resposta'
                                FROM alternatives as al, user_answer as ua
                                WHERE ua.cod_alternatives = al.cod;");

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}