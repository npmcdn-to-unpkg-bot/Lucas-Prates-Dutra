<?php

class Topic
{
    private $tittle;
    private $info; //Its a short description about the topic;
    private $qtd_questions;
    private $best_score;
    private $last_score;
    private $test_test_time;

    public function __construct($tittle, $info, $qtd_questions, $best_score, $last_score, $test_time)
    {
        $this->setTittle($tittle);
        $this->setInfo($info);
        $this->setQtdquestions($qtd_questions);
        $this->setBestScore($best_score);
        $this->setLastScore($last_score);
        $this->setTestTime($test_time);
    }

    public function setTittle($tittle)
    {
        $this->tittle = $tittle;
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

    public function setTestTime($test_time)
    {
        $this->test_time = $test_time;
    }

    public function getTittle()
    {
        return $this->tittle;
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

    public function getTestTime()
    {
        return $this->test_time;
    }

}