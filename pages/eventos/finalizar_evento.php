<?php
session_start();
include('../../dist/includes/dbcon.php');
$id_evento = $_GET['id_evento'];



$update = mysqli_query($con, "UPDATE eventos SET 
    estado= 'finalizado'
    WHERE id_evento = '$id_evento'") or die(mysqli_error($con));

if ($update) {
    echo "<script>document.location='eventos.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrió un error en la actualizacion de gastos del evento');</script>";
    echo "<script>document.location='eventos.php'</script>";
}
