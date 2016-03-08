<?php

class Math
{

    private $pi = 3.14159261;

/*    public function calculateCircleArea($radius){
        return $this->pi * $radius * $radius;
    }

    function fibonacci($position) {
        if($position == 0)
            return 0;
        if($position == 0)
            return 1;
        return fibonacci($position - 1) + fibonacci($position - 2);
    }
*/
    public function getHipotenusa($catetoAdj, $catetoOposto) {
        return sqrt($catetoAdj * $catetoAdj + $catetoOposto * $catetoOposto);
    }

    // The functions calculateCircleArea and fibonacci were commented to leave just the function getHipotenusa running
}