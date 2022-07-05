<?php
session_start();

include('../../dist/includes/dbcon.php');

$nombre_producto = $_POST['nombre_producto_evento'];
$descripcion = $_POST['descripcion_producto_evento'];
$precio_venta = $_POST['precio_venta_producto_evento'];
$precio_compra = $_POST['precio_compra_producto_evento'];
$stock = $_POST['stock_producto_evento'];
$id_evento = $_POST['id_evento'];

// print_r($_POST);

$insert = mysqli_query($con, "INSERT INTO evento_productos(nombre, descripcion, precio_venta, precio_compra, stock, estado, id_evento)
				VALUES('$nombre_producto','$descripcion','$precio_venta','$precio_compra', '$stock','activo', '$id_evento')") or die(mysqli_error($con));

if ($insert) {
    echo "<script>document.location='../evento_productos/evento_productos.php?id_evento=$id_evento'</script>";
} else {
    echo "<script type='text/javascript'>alert('Producto Agregado Correctamente!');</script>";
}
