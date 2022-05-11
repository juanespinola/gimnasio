<?php
session_start();
include('../../dist/includes/dbcon.php');


if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}
if (empty($_GET['id_sucursal'])) {
    echo "<script type='text/javascript'>alert('sucursal no seleccionada!');</script>";
    echo "<script>document.location='sucursales.php'</script>";
    exit;
}

$id_sucursal = $_GET['id_sucursal'];
$id_empresa = $_SESSION['id_empresa'];
$estado = 'inactivo';
$update = mysqli_query($con, "UPDATE sucursales SET estado='$estado' WHERE id_empresa='$id_empresa' AND id_sucursal='$id_sucursal'") or die(mysqli_error($con));

if ($update) {
    echo "<script type='text/javascript'>alert('Registro actualizado Correctamente!');</script>";
    echo "<script>document.location='sucursales.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error en cerrar la sucursal');</script>";
    echo "<script>document.location='sucursales.php'</script>";
}
