<?php
session_start();
include('../../dist/includes/dbcon.php');


if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}

if (empty($_POST['descripcion'])) {
    echo "<script type='text/javascript'>alert('Descripcion vacia!');</script>";
    echo "<script>document.location='sucursales.php'</script>";
    exit;
}
if (empty($_POST['direccion'])) {
    echo "<script type='text/javascript'>alert('Direccion vacia!');</script>";
    echo "<script>document.location='sucursales.php'</script>";
    exit;
}

$id_sucursal = $_POST['id_sucursal'];
$descripcion = $_POST['descripcion'];
$direccion = $_POST['direccion'];
$estado = $_POST['estado'];
$id_empresa = $_SESSION['id_empresa'];

$update = mysqli_query($con, "UPDATE sucursales SET 
    descripcion='$descripcion', 
    direccion='$direccion',
    estado='$estado'
    WHERE id_empresa='$id_empresa' AND id_sucursal='$id_sucursal'") or die(mysqli_error($con));

if ($update) {
    echo "<script type='text/javascript'>alert('Registro actualizado Correctamente!');</script>";
    echo "<script>document.location='sucursales.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error en actualizar la sucursal');</script>";
    echo "<script>document.location='sucursales.php'</script>";
}
