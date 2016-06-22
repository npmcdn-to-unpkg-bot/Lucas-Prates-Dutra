<?php

include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/CertifiedController.php";
include_once "control/TopicController.php";
include_once "control/QuestionController.php";
include_once "control/UserAnswerController.php";
include_once "control/AnswerController.php";

class ResourceController
{
    private $controlMap = ["user" => "UserController",
                           "certified" => "CertifiedController",
                           "topic" => "TopicController",
                           "question" => "QuestionController",
                           "user_answer" => "UserAnswerController",
                           "answer" => "AnswerController"];

    public function createResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->register($request);
    }

    public function searchResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->search($request);
    }

    public function updateResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->update($request);
    }

    public function deleteResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->delete($request);
    }

}

