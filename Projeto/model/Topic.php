<?php

class Topic
{
    //private $id;
    private $name;
    private $info; //Its a short description about the topic;
    private $qtd_questions;
    private $best_score;
    private $last_score;
    private $time;

    public function __construct($name, $info, $qtd_questions, $best_score, $last_score, $time)
    {
        $this->setName($name);
        $this->setInfo($info);
        $this->setQtdquestions($qtd_questions);
        $this->setBestScore($best_score);
        $this->setLastScore($last_score);
        $this->setTime($time);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function setQtdQuestions($qtd_questions)
    {
        $this->qtd_questions = $qtd_questions;
    }

    public function setBestScore($best_score)
    {
        $this->best_score = $best_score;
    }

    public function setLastScore($last_score)
    {
        $this->last_score = $last_score;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getQtdQuestions()
    {
        return $this->qtd_questions;
    }

    public function getBestScore()
    {
        return $this->best_score;
    }

    public function getLastScore()
    {
        return $this->last_score;
    }

    public function getTime()
    {
        return $this->time;
    }

}