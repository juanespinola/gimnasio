<?php
session_start();
include('../../dist/includes/dbcon.php');
$id_sucursal = $_SESSION['id_sucursal'];

$query = mysqli_query($con, "SELECT * FROM caja WHERE estado = 'abierto' AND id_sucursal = '$id_sucursal'") or die(mysqli_error($con));

if ($query->num_rows == 0) {
    echo "<script type='text/javascript'>alert('Debe contar con una caja activa!');</script>";
    echo "<script>document.location='../layout/inicio.php'</script>";
    exit;
}


$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];


mysqli_query($con, "INSERT INTO gastos(fecha, descripcion, cantidad, id_sucursal) VALUES('$fecha','$descripcion','$cantidad', '$id_sucursal')") or die(mysqli_error($con));

$update = mysqli_query($con, "UPDATE caja SET monto=monto-'$cantidad' WHERE estado='abierto' AND id_sucursal = '$id_sucursal'");

echo "<script>document.location='gastos.php'</script>";
