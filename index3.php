<?php
include_once('Chocolate.php');


$chocolate = new Chocolate('Chocolate belga', 2, 4.20,2 ,1000);

echo ($chocolate->muestraResumen());
?>