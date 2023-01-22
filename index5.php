<?php
include_once('Bollo.php');
include_once('Chocolate.php');
include_once ('Cliente.php');
include_once ('Pasteleria.php');
include_once('Tarta.php');

$pasteleria = new Pasteleria("CalvinMuffin");

$pasteleria->incluirCliente("Maria");
$pasteleria->incluirChocolate("Choco Colombiano", 2.60, 80, 110);
$pasteleria->incluirBollo("Donnut", 0.89, "Chocolate blanco");
$rellenos = ["Leche", "negro", "Blanco"];
$pasteleria->incluirTarta("RedVelvet", 13.10, $rellenos,3, 3, 4);
echo ($pasteleria->listarProductos());
echo ($pasteleria->listarClientes());
$pasteleria->comprarClienteProducto(0, 0);
$pasteleria->comprarClienteProducto(0, 2);

echo $pasteleria->incluirCliente('Juanma');
$pasteleria->comprarClienteProducto(1, 2);
