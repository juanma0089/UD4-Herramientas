<?php
include_once ('Resumible.php');

abstract class Dulce implements Resumible{
    private const IVA = 0.21;
    function __construct(public $nombre, protected $numero, private $precio)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->precio = $precio;
    
    }
    public function getNumero()
    {
            return $this->numero;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function getPrecioConIVa(){
        return $this->precio + ($this->precio * self::IVA);
    }

    public function muestraResumen()
    {

        $string = "</br><strong>" . $this->nombre . "</strong><br>
            Número: " . $this->numero . "<br>
            Precio: " . $this->getPrecio() . " €<br>
            Precio IVA incluido: " . $this->getPrecioConIva() . " €<br>";

        return $string;

    }
}

?>