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

date_default_timezone_set('America/Asuncion');

$descripcion = $_POST['descripcion'];
$direccion = $_POST['direccion'];
$fecha_agregado = date("Y-m-d H:i:s");
$id_empresa = $_SESSION['id_empresa'];
$estado = $_POST['estado'];

$insert_sucursal = mysqli_query($con, "INSERT INTO sucursales (descripcion, direccion, fecha_agregado, id_empresa, estado) VALUES ('$descripcion', '$direccion', '$fecha_agregado', '$id_empresa', '$estado')") or die(mysqli_error($con));
if ($insert_sucursal) {
    echo "<script type='text/javascript'>alert('Registro agregado correctamente!');</script>";
    echo "<script>document.location='sucursales.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Registro no agregado correctamente!');</script>";
    echo "<script>document.location='sucursales.php'</script>";
}
