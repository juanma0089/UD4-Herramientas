<?php
include_once('Dulces.php');
include_once ('./util/DulceNoCompradoException.php');

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

       array_push($this->dulcesComprados, $dulce);
        $this->numPedidosEfectuados++;

        if (in_array($dulce, $this->dulcesComprados)) {
            return true;
        } else {
            throw new DulceNoCompradoException("No se ha podido completar la compra");
        }
    }

    public function valorar(Dulce $dulce, string $comentario){

      try {
            if ($this->listaDeDulces($dulce)) {
                echo "Se ha valorado con éxito";
            } else {
                throw new DulceNoCompradoException("No has comprado el dulce a valorar");
            }
        } catch (DulceNoCompradoException $e) {
            echo $e->getMensaje();
        }

    }

    public function listaDeDulces(Dulce $dulce): bool{

        return in_array($dulce, $this->dulcesComprados);
    }

    public function listarPedidos(): string{

        //* Función de void a String para llamarla desde muestraResumen.
        $string = "Llevas ".$this->numPedidosEfectuados." pedidos:";
        foreach ($this->dulcesComprados as $dulce) {
            $string .= "<br>- ".$dulce->nombre;
        }
        return $string;
    }

    public function muestraResumen()
    {

        $string = "</br><strong>" . $this->nombre . 
        "</strong><br> Número: " . $this->numero . "<br>".
        $this->listarPedidos();

           return  $string;
    }

}

?>