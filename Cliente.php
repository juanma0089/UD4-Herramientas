<?php
include_once('Dulces.php');

class Cliente{
    function __construct(public $nombre, private $numero, private $dulcesComprados = [], private $numDulcesComprados, private $numPedidosEfectuados )
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->dulcesComprados = $dulcesComprados;
        $this->numDulcesComprados = $numDulcesComprados;
        $this->numPedidosEfectuados = $numPedidosEfectuados;
    
    }
    public function getNumero()
    {
        return $this->numero;
    }

    public function getDulcesComprados()
    {
        return $this->dulcesComprados;
    }
   
    public function getNumDulcesComprados()
    {
        return $this->numDulcesComprados;
    }

    public function getNumPedidosEfectuados()
    {
        return $this->numPedidosEfectuados;
    }

    public function comprar(Dulce $dulce): bool {

        return false;
    }

    public function valorar(Dulce $dulce, string $comentario){

    }

    public function listaDeDulces(Dulce $dulce): bool{

        return false;
    }

    public function listarPedidos(): void{

    }

}

?>