<?php


class Pasteleria{
    private $productos = [];
    private $numProductos = 0; 
    private $clientes = [];
    private $numClientes = 0;
    function __construct(private $nombre)
    {
   
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
        //comoprobamos si el cliente existe
        foreach ($this->clientes as $cliente) {
            if ($cliente->getNumero() == $numCliente) {

            }


        }
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