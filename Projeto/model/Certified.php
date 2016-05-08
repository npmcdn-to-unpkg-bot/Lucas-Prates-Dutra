<?php


class Certified
{
    //private $id;
    private $tittle;
    private $description;
    private $difficult; //search for a better alias
    private $area;
    private $requirements;

    public function __construct($tittle, $info, $difficult, $area, $requirements)
    {
        $this->setName($tittle);
        $this->setDescription($info);
        $this->setLevel($difficult);
        $this->setArea($area);
        $this->setRequirements($requirements);
    }

    public function setTittle($tittle)
    {
        $this->tittle = $tittle;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDifficult($difficult)
    {
        $this->difficult = $difficult;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }

    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    public function getTittle()
    {
        return $this->tittle;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDifficult()
    {
        return $this->difficult;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function getRequirements()
    {
        return $this->requirements;
    }

}