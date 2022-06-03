<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];

$id_recordatorio = $_GET['id_recordatorio'];
$descripcion = $_POST['update_descripcion_recordatorio'];
$fecha_desde = $_POST['update_fecha_desde_recordatorio'];
$fecha_hasta = $_POST['update_fecha_hasta_recordatorio'];
$comentario = $_POST['update_comentario_recordatorio'];
$estado = $_POST['update_recordatorio_estado'];
$id_sucursal = $_SESSION['id_sucursal'];
$id_usuario = $_SESSION['id'];


$update = mysqli_query($con, "UPDATE recordatorios SET 
    estado='finalizado' 
    WHERE id_recordatorio='$id_recordatorio'") or die(mysqli_error($con));

if ($update) {
    echo "<script type='text/javascript'>alert('Registro actualizado correctamente!');</script>";
    echo "<script>document.location='recordatorios.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error al actualizar recordatorio!');</script>";
    echo "<script>document.location='recordatorios.php'</script>";
}
