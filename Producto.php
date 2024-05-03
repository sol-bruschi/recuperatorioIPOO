<?php
class Producto {
    private $codigoBarra;
    private $marca;
    private $descripcion;
    private $color;
    private $cantStock;

    public function __construct($codigoBarra, $marca, $descripcion, $color, $cantStock) {
        $this->codigoBarra = $codigoBarra;
        $this->marca = $marca;
        $this->descripcion = $descripcion;
        $this->color = $color;
        $this->cantStock = $cantStock;
    }

    // Getters y setters
    public function getCodigoBarra() {
        return $this->codigoBarra;
    }

    public function setCodigoBarra($codigoBarra) {
        $this->codigoBarra = $codigoBarra;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getCantStock() {
        return $this->cantStock;
    }

    public function setCantStock($cantStock) {
        $this->cantStock = $cantStock;
    }

    // Método para actualizar el stock
    public function actualizarStock($cantStock) {
        if ($cantStock > 0) {
            $this->cantStock += $cantStock;
        } else {
            $this->cantStock -= ($cantStock);
        }
    }

    // Método toString
    public function __toString() {
        return "Codigo de Barras: ".$this->codigoBarra."\n".
               "Descripción: ".$this->descripcion."\n".
               "Marca: ".$this->marca."\n".
               "Color: ".$this->color."\n".
               "Cantidad en Stock: ".$this->cantStock."\n";
    }
}
