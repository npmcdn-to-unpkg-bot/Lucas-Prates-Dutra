<?php

include_once "model/Request.php";
include_once "model/Topic.php";
include_once "database/DbConnector.php";

class TopicController
{
    private $requiredParameters = array('tittle', 'info', 'qtd_questions', 'best_score', 'last_score', 'test_time');

    public function register($request)
    {
        $params = $request->get_params();
        if ($this->isValid($params)) {
            $topic = new Topic($params["tittle"],
                $params["info"],
                $params["qtd_questions"],
                $params["best_score"],
                $params["last_score"],
                $params["test_time"]);

            $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

            $conn = $db->getConnection();

            return $conn->query($this->generateInsertQuery($topic));
        } else
            echo "Error 400: Bad Request";
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

    public function update($request)
    {
        $params = $request->get_params();

        //var_dump($params);

        //$crit = $this->generateCriteriaUpdate($params);

        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();

        //Falha: o email não poderá ser trocado
        foreach ($params as $key => $value) {
            $result = $conn->query("UPDATE topic SET " . $key . " = " . $value . " WHERE tittle = " . $params["tittle"]);
        }

        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();


        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();


        $result = $conn->query("DELETE FROM topic WHERE tittle = " . $params["tittle"]);

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