<?php
session_start();
include('../../dist/includes/dbcon.php');
if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../index.php'</script>";
}

$id_producto = $_POST['id_producto'];
$id_evento = $_POST['id_evento'];
$cantidad = $_POST['cantidad'];
$update = mysqli_query($con, "UPDATE evento_productos SET 
    stock=stock+'$cantidad',
    estado='activo'
WHERE id_evento_producto='$id_producto' ");

echo "<script>document.location='../evento_productos/evento_productos.php?id_evento=$id_evento'</script>";
