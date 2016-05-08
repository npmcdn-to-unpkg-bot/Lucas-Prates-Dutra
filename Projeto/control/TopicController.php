<?php

include_once "model/Request.php";
include_once "model/Topic.php";
include_once "database/DbConnector.php";

class TopicController
{
    public function register($request)
    {
        $params = $request->get_params();
        $topic = new Topic($params["tittle"],
            $params["info"],
            $params["qtd_questions"],
            $params["best_score"],
            $params["last_score"],
            $params["test_time"]);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($topic));
    }

    private function generateInsertQuery($topic)
    {
        $query = "INSERT INTO topic (tittle, info, qtd_questions, best_score, last_score, test_time)
                  VALUES ('" . $topic->getTittle() . "','" .
            $topic->getInfo() . "','" .
            $topic->getQtdQuestions() . "','" .
            $topic->getBestScore() . "','" .
            $topic->getLastScore() . "','" .
            $topic->getTestTime() . "')";
        return $query;
    }


    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT tittle, info, qtd_questions, best_score, last_score, test_time FROM topic WHERE " . $crit);

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