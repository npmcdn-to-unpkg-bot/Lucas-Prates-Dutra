<?php


class Certified
{
    //private $id;
    private $name;
    private $description;
    private $level; //search for a better alias
    private $area;
    private $requirements;

    public function __construct($name, $info, $lvl, $area, $requirements)
    {
        $this->setName($name);
        $this->setDescription($info);
        $this->setLevel($lvl);
        $this->setArea($area);
        $this->setRequirements($requirements);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }

    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLevel()
    {
        return $this->level;
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