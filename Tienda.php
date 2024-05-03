<?php

class Tienda {
    private $nombre;
    private $direccion;
    private $telefono;
    private $colProductos;
    private $colVentas;

    public function __construct($nombre, $direccion, $telefono) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->colProductos = [];
        $this->colVentas = [];
    }

    // Métodos getters y setters (con prefijos y nombres descriptivos)
    public function getNombreTienda() {
        return $this->nombre;
    }

    public function setNombreTienda($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccionTienda() {
        return $this->direccion;
    }

    public function setDireccionTienda($direccion) {
        $this->direccion = $direccion;
    }

    public function getTelefonoTienda() {
        return $this->telefono;
    }

    public function setTelefonoTienda($telefono) {
        $this->telefono = $telefono;
    }

    public function getColProductos() {
        return $this->colProductos;
    }

    public function setColProductos($colProductos) {
        $this->colProductos = $colProductos;
    }

    public function getColVentas() {
        return $this->colVentas;
    }

    public function setColVentas($colVentas) {
        $this->colVentas = $colVentas;
    }

    // Método para buscar un producto por su código de barras
    public function buscarProducto($codigoBarra) {
        foreach ($this->colProductos as $indice => $producto) {
            if ($producto->getCodigoBarra() == $codigoBarra) {
                return $indice; // Retornar el índice del producto encontrado
            }
        }
    
        return -1; // Retornar -1 si el producto no se encuentra
    }
    
    // Método para agregar un producto a la tienda
    public function agregarProducto($producto) {
        $this->colProductos[] = $producto;
    }

    // Método para realizar una venta de productos
    public function realizarVenta($productosAVender) {
        $venta = new Venta(date('Y-m-d'), null, null, null, []); // Crear una nueva venta
        $ventaExitosa = true; // Bandera para indicar si la venta se realizó con éxito
    
        foreach ($productosAVender as $producto) {
            $codigoBarra = $producto['codigo_barra'];
            $cantidadAVender = $producto['cantidad'];
    
            $objProducto = $this->buscarProducto($codigoBarra);
    
            if ($objProducto !== null) {
                // Intentar incorporar el producto a la venta
                $productoModificado = $venta->incorporarProducto($objProducto, $cantidadAVender);
                
                // Verificar si la venta del producto fue exitosa
                if ($productoModificado === null) {
                    // Si no se pudo vender el producto, la venta no fue exitosa
                    $ventaExitosa = false;
                    break; // No es necesario continuar con la venta
                }
            } else {
                // Si el producto no se encuentra en la tienda, la venta no es posible
                $ventaExitosa = false;
                break; // No es necesario continuar con la venta
            }
        }
    
        if ($ventaExitosa) {
            return $venta; // Devolver la venta si se realizó con éxito
        } else {
            return null; // Devolver null si no se pudo realizar la venta
        }
    }
    
}