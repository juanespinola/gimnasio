<?php
session_start();
include('../../dist/includes/dbcon.php');

$id_evento = $_POST['id_evento'];
$descripcion = $_POST['descripcion_evento'];
$fecha_inicio = $_POST['fecha_inicio_evento'];
$fecha_fin = $_POST['fecha_final_evento'];
$id_sucursal = $_POST['sucursal_evento'];
$estado = $_POST['estado'];


$update = mysqli_query($con, "UPDATE eventos SET 
    descripcion='$descripcion', 
    fecha_inicio='$fecha_inicio',
    fecha_fin='$fecha_fin', 
    id_sucursal='$id_sucursal', 
    estado='$estado'
WHERE id_evento='$id_evento'") or die(mysqli_error($con));

if ($update) {
    echo "<script type='text/javascript'>alert('Registro actualizado Correctamente!');</script>";
    echo "<script>document.location='eventos.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error al actualizar el Evento');</script>";
    echo "<script>document.location='eventos.php'</script>";
}
