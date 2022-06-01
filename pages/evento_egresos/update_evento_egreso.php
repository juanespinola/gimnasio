<?php
session_start();
include('../../dist/includes/dbcon.php');
$id_evento = $_POST['id_evento'];
$id_evento_gasto = $_POST['id_evento_gasto'];
$descripcion = $_POST['update_descripcion_evento_egreso'];
$monto = $_POST['update_monto_gasto'];
$fecha_actual = date("Y-m-d");


$update = mysqli_query($con, "UPDATE evento_gastos SET 
    fecha= '$fecha_actual',
    descripcion ='$descripcion', 
    cantidad='$monto'
    WHERE id_evento = '$id_evento'
    AND id_evento_gasto = '$id_evento_gasto'") or die(mysqli_error($con));

if ($update) {
    echo "<script>document.location='evento_egresos.php?id_evento=$id_evento'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrió un error en la actualizacion de gastos del evento');</script>";
    echo "<script>document.location='evento_egresos.php?id_evento=$id_evento'</script>";
}
