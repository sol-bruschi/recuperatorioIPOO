<?php

class Venta {
    private $fechaVenta;
    private $objCliente;
    private $nroFactura;
    private $tipoComprobante;
    private $colItems;

    public function __construct($fechaVenta, $objCliente, $nroFactura, $tipoComprobante, $colItems) {
        $this->fechaVenta = $fechaVenta;
        $this->objCliente = $objCliente;
        $this->nroFactura = $nroFactura;
        $this->tipoComprobante = $tipoComprobante;
        $this->colItems = $colItems;
    }

    // Métodos getters y setters
    public function getFechaVenta() {
        return $this->fechaVenta;
    }

    public function setFechaVenta($fechaVenta) {
        $this->fechaVenta = $fechaVenta;
    }

    public function getObjCliente() {
        return $this->objCliente;
    }

    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }

    public function getNroFactura() {
        return $this->nroFactura;
    }

    public function setNroFactura($nroFactura) {
        $this->nroFactura = $nroFactura;
    }

    public function getTipoComprobante() {
        return $this->tipoComprobante;
    }

    public function setTipoComprobante($tipoComprobante) {
        $this->tipoComprobante = $tipoComprobante;
    }

    public function getColItems() {
        return $this->colItems;
    }

    public function setColItems($colItems) {
        $this->colItems = $colItems;
    }

    // Método incorporarProducto
    public function incorporarProducto($objProducto, $cantidadAVender) {
        $ventaRealizada = false; // Bandera para controlar si la venta se realizó
        
        // Verificar si $objProducto es una instancia de la clase Producto
        if ($objProducto instanceof Producto) {
            // Verificar si hay suficiente stock para realizar la venta
            if ($objProducto->getCantStock() >= $cantidadAVender) {
                // Crear un nuevo ítem
                $nuevoItem = new Item($cantidadAVender, $objProducto);
                
                // Agregar el ítem a la colección de ítems de la venta
                $this->colItems[] = $nuevoItem;
                
                // Actualizar el stock del producto
                $nuevoStock = $objProducto->getCantStock() - $cantidadAVender;
                $objProducto->setCantStock($nuevoStock);
                
                $ventaRealizada = true; // La venta se realizó con éxito
            }
        } else {
            // Si $objProducto no es una instancia de Producto, la venta no es posible
            $ventaRealizada = false;
        }
        
        if ($ventaRealizada) {
            return $objProducto; // Retornar el objeto de producto modificado
        } else {
            return null; // No hay suficiente stock para realizar la venta o $objProducto no es un Producto válido
        }
    }
    
    // Método __toString
    public function __toString() {
        $cadena = "Fecha de Venta: " . $this->fechaVenta . "\n";
        $cadena .= "Número de Factura: " . $this->nroFactura . "\n";
        $cadena .= "Tipo de Comprobante: " . $this->tipoComprobante . "\n";
        $cadena .= "Cliente: " . $this->objCliente . "\n";
        $cadena .= "Ítems de la Venta:\n";
        foreach ($this->colItems as $item) {
            $cadena .= $item . "\n";
        }
        return $cadena;
    }
}