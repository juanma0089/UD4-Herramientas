<?php
include_once('Dulces.php');

class Cliente{

    private $dulcesComprados = [];

    function __construct(public $nombre, private $numero ,private $numPedidosEfectuados = 0 )
    {
        
    
    }
    public function getNumero()
    {
        return $this->numero;
    }

    public function getDulcesComprados()
    {
        return $this->dulcesComprados;
    }
   
    public function getNumPedidosEfectuados()
    {
        return $this->numPedidosEfectuados;
    }

    public function comprar(Dulce $dulce): bool {
        //miramos si el dulce está dentro del array
        if (in_array($dulce, $this->dulcesComprados)) {
            foreach ($this->dulcesComprados as $key => $count) {
                if ($key == $dulce) {
                    
                }else {
                    $this->dulcesComprados[$key] = $dulce;
                    $count+= $this->numPedidosEfectuados;
                }
            }
        }
        return true;
    }

    public function valorar(Dulce $dulce, string $comentario){

    }

    public function listaDeDulces(Dulce $dulce): bool{

        return false;
    }

    public function listarPedidos(): void{

    }

    public function muestraResumen()
    {

        $string = "</br><strong>" . $this->nombre . 
        "</strong><br> Número: " . $this->numero . "<br>";

           return  $string;
    }

}

?>