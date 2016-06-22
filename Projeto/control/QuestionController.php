<?php

include_once "model/Request.php";
include_once "model/Question.php";
include_once "database/DbConnector.php";

class QuestionController
{
    public function register($request)
    {
        $params = $request->get_params();
        //if ($this->isValid($params)) {
            $question = new question($params["enunciation"],
                $params["type_question"],
                $params["alternatives"]);

            $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

            $conn = $db->getConnection();

            return $conn->query($this->generateInsertQuery($question));
     //   } else
       //     echo "Error 400: Bad Request";
    }

    private function generateInsertQuery($question)
    {
        $query = "INSERT INTO question (enunciation, type_question, alternatives)
                  VALUES ('" . $question->getEnunciation() . "','" .
                               $question->getTypeQuestion() . "','" .
                               $question->getAlternatives() . "')";
        return $query;
    }


    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT q.enunciation,
                                (SELECT al.description FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod) as al1,
                                (SELECT al.cod FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod) as cod_al1,
                                (SELECT al.description FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod + 1) as al2,
                                (SELECT al.cod FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod + 1) as cod_al2,
                                (SELECT al.description FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod + 2) as al3,
                                (SELECT al.cod FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod + 2) as cod_al3,
                                (SELECT al.description FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod + 3) as al4,
                                (SELECT al.cod FROM alternatives as al, question as q WHERE al.cod_question = q.cod AND al.cod = a.cod + 3) as cod_al4
                                 FROM question as q, alternatives as a WHERE a.cod_question = q.cod AND " . $crit . " GROUP BY q.enunciation");

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

        $db = new DatabaseConnector("localhost", "training_center", "mysql", "", "root", "");

        $conn = $db->getConnection();

        foreach ($params as $key => $value) {
            $result = $conn->query("UPDATE question SET " . $key . " = '" . $value . "' WHERE enunciation = '" . $params["enunciation"] . "'");
        }

        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();


        $db = new DatabaseConnector("localhost", "projeto", "mysql", "", "root", "");

        $conn = $db->getConnection();


        $result = $conn->query("DELETE FROM question WHERE enunciation = '" . $params["enunciation"] . "'");

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