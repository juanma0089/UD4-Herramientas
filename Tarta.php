<?php
include_once('Dulces.php');

class Tarta extends Dulce{

    function __construct($nombre,$numero , $precio, private $rellenos = [], private $numPisos, private $minNumComensales = 2, private $maxNunComensales ){
 
        parent::__construct($nombre, $numero, $precio);

        $this->rellenos = $rellenos;
        $this->numPisos = $numPisos;
        $this->minNumComensales = $minNumComensales;
        $this->maxNunComensales = $maxNunComensales;
   }

   public function getRellenos()
    {
        return $this->rellenos;
    }
    public function getNumPisos()
    {
        return $this->numPisos;
    }

    public function getMinNumComensales()
    {
        return $this->minNumComensales;
    }
    public function getMaxNunComensales()
    {
        return $this->maxNunComensales;
    }

    public function muestraComensalesPosibles(){
        // compruebo si el mínimo y máximo es superior a 2 y el minimo es menor o igual al máximo
        if ($this->minNumComensales > 2 && $this->maxNunComensales > 2 && $this->minNumComensales <= $this->maxNunComensales) {

            // si el minimo es igual al maximo
                        if ($this->minNumComensales == $this->maxNunComensales) {
            
            //  hago un ternario y digo que si es igual a 2 es para 2 comensales y sino para x comensales
                            return $this->minNumComensales == 2 ? "Tarta para".$this->minNumComensales : "Tarta para " . $this->getMinNumComensales() . " comensales";
            
                        } else {
            
                            return "Tarta para " . $this->getMinNumComensales() . " a " . $this->getMaxNunComensales() . " comensales";
                        }
                    }else{
            
                        return "Error en el número de comensales";
                    }
    }

    public function muestraRelleno(){
        $string = '';  
        foreach ($this->rellenos as $relleno) {

            $string .= $relleno . ', ';
        }
        return $string;
    }
    public function muestraResumen(){

        return parent::muestraResumen() .
            'Rellenos: ' . $this->muestraRelleno() . '<br>
            Número de pisos: ' . $this->numPisos.'<br>
            Número de comensales: '.$this->muestraComensalesPosibles().'<br>';
     }

    
}

?>