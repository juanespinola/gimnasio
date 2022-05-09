<?php
session_start();
include('../../dist/includes/dbcon.php');

if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}

date_default_timezone_set('America/Asuncion');

if ($_GET["id_actividad"] == '') {
    echo "<script>document.location='../asistencias/asistencias.php'</script>";
    exit;
}


$id_actividad = $_GET["id_actividad"];
$fecha_actual = date("Y-m-d H:i:s");

$sql = "INSERT INTO `asistencia_clientes` (`fecha_asistencia`,`id_actividad`)
    VALUES
    (
        '" . $fecha_actual . "',
        '" . $id_actividad . "'
    );";

$insert = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($insert) {
    echo "<script>document.location='../asistencias/asistencias.php'</script>";
}
