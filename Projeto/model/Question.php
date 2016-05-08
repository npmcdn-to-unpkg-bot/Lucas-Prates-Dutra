<?php


class Question
{
    //private $id;
    private $enunciation;
    private $type_question;
    private $alternatives; //See more about this part, maybe its can be a entity (object)

    public function __construct($enunciation, $type_question, $alternatives)
    {
        $this->setEnunciation($enunciation);
        $this->setTypeQuestion($type_question);
        $this->setAlternatives($alternatives);
    }

    public function setEnunciation($enunciation)
    {
        $this->enunciation = $enunciation;
    }

    public function setTypeQuestion($type_question)
    {
        $this->type_question = $type_question;
    }

    public function setAlternatives($alternatives)
    {
        $this->alternatives = $alternatives;
    }

    public function getEnunciation()
    {
        return $this->enunciation;
    }

    public function getTypeQuestion()
    {
        return $this->type_question;
    }

    public function getAlternatives()
    {
        return $this->alternatives;
    }


}