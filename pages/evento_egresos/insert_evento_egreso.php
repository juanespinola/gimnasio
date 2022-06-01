<?php
session_start();
include('../../dist/includes/dbcon.php');
$id_evento = $_POST['id_evento'];
$descripcion = $_POST['descripcion_evento_egreso'];
$monto = $_POST['monto_gasto'];
$fecha_actual = date("Y-m-d");


$insert = mysqli_query($con, "INSERT INTO evento_gastos(fecha, descripcion, cantidad, id_evento) VALUES('$fecha_actual','$descripcion','$monto', '$id_evento')") or die(mysqli_error($con));

if ($insert) {
    echo "<script>document.location='evento_egresos.php?id_evento=$id_evento'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrió un error en el registro de gastos del evento');</script>";
    echo "<script>document.location='evento_egresos.php?id_evento=$id_evento'</script>";
}
