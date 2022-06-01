<?php
session_start();
include('../../dist/includes/dbcon.php');
$id_evento = $_GET['id_evento'];
$id_evento_gasto = $_GET['id_evento_gasto'];



$delete = mysqli_query($con, "DELETE FROM evento_gastos
        WHERE id_evento_gasto = '$id_evento_gasto'") or die(mysqli_error($con));

if ($delete) {
    echo "<script>document.location='evento_egresos.php?id_evento=$id_evento'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrió un error en la actualizacion de gastos del evento');</script>";
    echo "<script>document.location='evento_egresos.php?id_evento=$id_evento'</script>";
}
