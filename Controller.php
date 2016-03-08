<?php

include "Math.php";

$math = new Math();
//echo $math->calculateCircleArea($_POST["radius"]) . "<br/>";
//echo $math->fibonacci($_POST["position"]);
echo $math->getHipotenusa($_POST["catetoAdj"], $_POST["catetoOposto"]);