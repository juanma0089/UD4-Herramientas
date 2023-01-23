<?php

use Monolog\Logger;
use util\LogFactory;

include_once ('Chocolate.php');
include_once ('Bollo.php');
include_once ('Tarta.php');
include_once ('Cliente.php');
include_once ('./util/ClienteNoEncontradoException.php');
include_once ('./util/DulceNoEncontradoException.php');
include_once ('./util/DulceNoCompradoException.php');
include_once('./util/logFactory.php');


class Pasteleria{
    private $productos = [];
    private $numProductos = 0; 
    private $clientes = [];
    private $numClientes = 0;

    private Logger $log;
    function __construct(private $nombre)
    {
        $this->log = LogFactory::getLogger();
    }

    private function incluirProducto(Dulce $dulce){
        // al crear un producto lo incluimos en el array de productos
        array_push($this->productos, $dulce);

    }
    public function incluirTarta($nombre,$precio, $numPisos, $rellenos = [], $minC, $maxC){

        $tarta = new Tarta($nombre, $this->numProductos, $precio, $numPisos, $rellenos, $minC, $maxC);
        $this->incluirProducto($tarta);
        $this->numProductos++;

    }

    public function incluirBollo($nombre, $precio, $relleno){

        $bollo = new Bollo($nombre, $this->numProductos, $precio, $relleno);
        $this->incluirProducto($bollo);
        $this->numProductos++;
    }

    public function incluirChocolate($nombre, $precio, $porcentajeCacao, $peso){

        $chocolate = new Chocolate($nombre, $this->numProductos, $precio, $porcentajeCacao, $peso);
        $this->incluirProducto($chocolate);
        $this->numProductos++;
    }

    public function incluirCliente($nombre)
    {
        //al crear un nuevo cliente lo añadimos en el array de clientes y mostramos datos
        $cliente = new Cliente($nombre, $this->numClientes);

        array_push($this->clientes, $cliente);

        echo "<br> Se ha creado un nuevo Cliente<br>
        Nombre: " . $nombre . " con el número de cliente " . $this->numClientes . "<br>";
        $this->numClientes++;
    }

    public function listarProductos()
    {

        foreach ($this->productos as $value) {
            $value->muestraResumen();
        }

    }

    public function listarClientes()
    {
        $string = '<br>Lista de clientes<br>';
        foreach ($this->clientes as $value) {
         $string .= $value->muestraResumen();
        }
    }

    public function comprarClienteProducto($numCliente, $numProductos ){

        try {
            //creo dos variables para guardar en ellas tanto cliente como producto y asi comprobar luego si hay algo guardado o no
            $clienteCreado = "";
            $productoCreado = "";

            foreach ($this->clientes as $cliente) {
                if ($cliente->getNumero() == $numCliente) {
                    $clienteCreado = $cliente;
                    try {
                        foreach ($this->productos as $producto) {
                            if ($producto->getNumero() == $numProductos) {
                                $productoCreado = $producto;
                                $cliente->comprar($producto);
                                echo "<br>Ha comprado " . $producto->nombre . "<br>";
                                return $this;
                            }
                        }
                    } catch (DulceNoCompradoException $e) {
                        echo $e->getMensaje();
                    }
                }
            }

            if ($clienteCreado === "") {
                $this->log->warning("Cliente no encontrado",[$numCliente]);
                throw new ClienteNoEncontradoException("No se ha encontrado al cliente con ese id<br>");
            } else if ($productoCreado === "") {
                throw new DulceNoEncontradoException("No se ha encontrado ningún dulce con ese id<br>");
            }
        } catch (ClienteNoEncontradoException $e) {
            echo $e->getMensaje();
        } catch (DulceNoEncontradoException $e) {
            echo $e->getMensaje();
        }
        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getProductos()
    {
        return $this->productos;
    }

    
}
?>