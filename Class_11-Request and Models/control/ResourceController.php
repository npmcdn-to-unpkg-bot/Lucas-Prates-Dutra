<?php

include_once "model/Request.php";

class ResourceController
{
    // Esse é apenas um exemplo. Será definido os objetos que entrarão neste array map
    private $controlMap = ["user" => "UserController",
                           "certified" => "CertifiedController",
                           "topic" => "TopicController",
                           "question => QuestionController" ];

    public function createResource($request)
    {
        $this->controlMap[($request->get_resource())];
    }
}

