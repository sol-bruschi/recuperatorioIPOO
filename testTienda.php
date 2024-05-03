<?php

include 'Producto.php';
include 'Item.php';
include 'Venta.php';
include 'Tienda.php';

// Crear algunos productos
$producto1 = new Producto("0001", "Marca1", "Descripción1", "Color1", 10);
$producto2 = new Producto("0002", "Marca2", "Descripción2", "Color2", 8);
$producto3 = new Producto("0003", "Marca3", "Descripción3", "Color3", 5);
$producto4 = new Producto("0004", "Marca4", "Descripción4", "Color4", 12);

// Crear la tienda
$tienda = new Tienda("Mi Tienda", "Dirección de la Tienda", "123456789");

// Agregar los productos a la tienda
$tienda->agregarProducto($producto1);
$tienda->agregarProducto($producto2);
$tienda->agregarProducto($producto3);
$tienda->agregarProducto($producto4);

// Crear un arreglo asociativo con la información de 3 de los productos
$colProductosAVender = [
    ['codigo_barra' => '0001', 'cantidad' => 5],
    ['codigo_barra' => '0002', 'cantidad' => 3],
    ['codigo_barra' => '0003', 'cantidad' => 2],
];

// Invocar al método realizarVenta con el arreglo asociativo creado
$ventaExitosa = $tienda->realizarVenta($colProductosAVender);

// Imprimir el resultado de la venta
if ($ventaExitosa) {
    echo "La venta se realizó con éxito.\n";
} else {
    echo "La venta no se pudo realizar debido a la falta de stock o productos no encontrados.\n";
}

// Imprimir la información de la tienda
echo "\nInformación de la Tienda:\n";
echo "Nombre: " . $tienda->getNombreTienda() . "\n";
echo "Dirección: " . $tienda->getDireccionTienda() . "\n";
echo "Teléfono: " . $tienda->getTelefonoTienda() . "\n\n";

echo "Productos en la Tienda:\n";
foreach ($tienda->getColProductos() as $producto) {
    echo $producto . "\n";
}

?>