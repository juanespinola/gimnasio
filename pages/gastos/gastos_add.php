<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];

$cantidad = $_POST['cantidad'];

mysqli_query($con, "INSERT INTO gastos(fecha,descripcion,cantidad) VALUES('$fecha','$descripcion','$cantidad')") or die(mysqli_error($con));

$update = mysqli_query($con, "UPDATE caja SET monto=monto-'$cantidad' WHERE estado='abierto' ");

echo "<script>document.location='gastos.php'</script>";
