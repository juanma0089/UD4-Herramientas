<?php 

include_once('Dulces.php');

class Chocolate extends Dulce{
    function __construct($nombre, $numero , $precio, private $porcentajeCacao, private $peso ){
 
         parent::__construct($nombre, $numero, $precio);

    }
   
    public function getPorcentajeCacao()
    {
        return $this->porcentajeCacao;
    }


    public function getPeso()
    {
        return $this->peso;
    }
     public function muestraResumen(){

        return parent::muestraResumen() .
            'Porcentaje de cacao: ' . $this->porcentajeCacao . ' %<br>
            Peso: ' . $this->peso.' g';
     }
 
 }
 
 ?>
