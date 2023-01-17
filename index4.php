<?php
include_once('Tarta.php');

$rellenos = ['Chocolate Negro', 'chocolate con leche',];

$tarta = new Tarta('Selva Negra',1, 5.40, $rellenos, 2, 3, 7);

echo ($tarta->muestraResumen());
?>