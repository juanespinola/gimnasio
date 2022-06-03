<?php
session_start();
include('../../dist/includes/dbcon.php');

$id_recordatorio = $_POST['id_recordatorio'];
$descripcion = $_POST['descripcion_recordatorio'];
$fecha_desde = $_POST['fecha_desde_recordatorio'];
$fecha_hasta = $_POST['fecha_hasta_recordatorio'];
$comentario = $_POST['comentario_recordatorio'];
$id_sucursal = $_SESSION['id_sucursal'];
$id_usuario = $_SESSION['id'];


$query = mysqli_query($con, "INSERT INTO recordatorios (descripcion, fecha_desde, fecha_hasta, comentario, id_usuario, id_sucursal) 
    VALUES('$descripcion', '$fecha_desde', '$fecha_hasta', '$comentario', '$id_usuario','$id_sucursal')") or die(mysqli_error($con));


if ($query) {
    echo "<script type='text/javascript'>alert('Registro agregado correctamente!');</script>";
    echo "<script>document.location='recordatorios.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error al registrar recordatorio!');</script>";
    echo "<script>document.location='recordatorios.php'</script>";
}
