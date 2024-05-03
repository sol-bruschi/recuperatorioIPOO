<?php

class Item {
    private $cantidadVendida;
    private $objProducto;

    public function __construct($cantidadVendida, $objProducto) {
        $this->setCantidadVendida($cantidadVendida);
        $this->setProducto($objProducto);
    }

    // Métodos getters y setters
    public function getCantidadVendida() {
        return $this->cantidadVendida;
    }

    public function setCantidadVendida($cantidadVendida) {
        $this->cantidadVendida = $cantidadVendida;
    }

    public function getProducto() {
        return $this->objProducto;
    }

    public function setProducto($objProducto) {
        $this->objProducto = $objProducto;
    }
}
