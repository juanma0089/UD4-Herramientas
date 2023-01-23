<?php
include_once('./Pasteleria.php');
use PHPUnit\Framework\TestCase;

class PasteleriaTest extends TestCase{
    public function testcrearPasteleria(){
        $paste = new Pasteleria("Calvo");

        $this->assertSame("Calvo", $paste->getNombre());
        $this->assertNotSame("Tuprima", $paste->getNombre());

    }
}