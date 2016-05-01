<?php

include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/CertifiedController.php";
include_once "control/TopicController.php";
include_once "control/QuestionController.php";

class ResourceController
{
    private $controlMap = ["user" => "UserController",
                           "certified" => "CertifiedController",
                           "topic" => "TopicController",
                           "question" => "QuestionController" ];

    public function createResource($request)
    {
        //return new $this->controlMap[$request->get_resource()]();
        return (new $this->controlMap[$request->get_resource()]())->register($request);
    }
}

