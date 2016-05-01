<?php

include_once "model/Request.php";
include_once "model/Topic.php";
include_once "database/DbConnector.php";

class TopicController
{
    public function register($request)
    {
        $params = $request->get_params();
        $topic = new Topic($params["name"],
            $params["info"],
            $params["qtd_questions"],
            $params["best_score"],
            $params["last_score"],
            $params["time"]);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($topic));
    }

    private function generateInsertQuery($topic)
    {
        $query = "INSERT INTO topic (name, info, qtd_questions, best_score, last_score, time)
                  VALUES ('" . $topic->getName() . "','" .
            $topic->getInfo() . "','" .
            $topic->getQtdQuestions() . "','" .
            $topic->getBestScore() . "','" .
            $topic->getLastScore() . "','" .
            $topic->getTime() . "')";
        return $query;
    }

}