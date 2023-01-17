<?php
include_once('Bollo.php');


$bollo = new Bollo('Bollicao', 2, 1.10,'crema');

echo ($bollo->muestraResumen());
?>