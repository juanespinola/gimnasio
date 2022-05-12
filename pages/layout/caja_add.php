<?php
session_start();
include('../../dist/includes/dbcon.php');

$monto = $_POST['monto'];
$fecha_apertura = date('Y-m-d');
$id_empresa = $_SESSION['id_empresa'];
$id_sucursal = $_SESSION['id_sucursal'];

$caja = mysqli_query($con, "INSERT INTO caja (estado, monto, fecha_apertura, fecha_cierre, id_empresa, id_sucursal) 
VALUES('abierto','$monto','$fecha_apertura', NULL, NULL, '$id_sucursal')") or die(mysqli_error($con));

if ($caja) {
    echo "<script>document.location='caja.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error en la apertura de caja');</script>";
    echo "<script>document.location='caja.php'</script>";
}
