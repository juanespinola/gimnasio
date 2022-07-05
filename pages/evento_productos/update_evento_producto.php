<?php
session_start();
if (empty($_SESSION['id'])) :
    header('Location:../index.php');
endif;
include('../../dist/includes/dbcon.php');

$id_producto = $_POST['id_evento_producto'];
$nombre_pro = $_POST['nombre_pro'];
$descripcion = $_POST['descripcion'];
$precio_venta = $_POST['precio_venta'];
$precio_compra = $_POST['precio_compra'];
$id_evento = $_POST['id_evento'];

$update = mysqli_query($con, "UPDATE evento_productos SET 
		nombre='$nombre_pro',
		descripcion='$descripcion',
		precio_venta='$precio_venta',
		precio_compra='$precio_compra'
	WHERE id_evento_producto='$id_producto'") or die(mysqli_error($con));

if ($update) {
    echo "<script>document.location='../evento_productos/evento_productos.php?id_evento=$id_evento'</script>";
} else {
    echo "<script type='text/javascript'>alert('Producto Actualizado Correctamente!');</script>";
}
