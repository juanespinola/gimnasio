<?php
session_start();
include('../../dist/includes/dbcon.php');

date_default_timezone_set('America/Asuncion');
if (isset($_REQUEST['id_profesor'])) {
    $id_profesor = $_REQUEST['id_profesor'];
    if ($id_profesor == 0) {
        echo "<script type='text/javascript'>alert('Por favor, seleccione un profesor!');</script>";
        echo "<script>document.location='salario_profesores.php'</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Por favor, seleccione un profesor!');</script>";
    echo "<script>document.location='salario_profesores.php'</script>";
}

$fecha_pago = date("Y-m-d H:i:s");
$mes_actual = date("Y-m");
$actividades = mysqli_query($con, "SELECT * FROM actividades WHERE id_profesor = '$id_profesor'") or die(mysqli_error($con));

while ($actividad = mysqli_fetch_array($actividades)) {
    $sueldos_pagos = mysqli_query($con, "SELECT * FROM sueldo_pago WHERE DATE_FORMAT(fecha_pago, '%Y-%m') = '$mes_actual' AND id_actividad = " . $actividad['id_actividad']) or die(mysqli_error($con));
    if ($sueldos_pagos->num_rows == 0) {
        $query = mysqli_query($con, "INSERT INTO sueldo_pago(fecha_pago,pago,id_profesor,id_actividad)
            SELECT 
            '$fecha_pago',
            sp.salario,
            a.id_profesor,
            a.id_actividad
            FROM sueldo_profesores sp
            LEFT JOIN actividades a ON sp.id_actividad = a.id_actividad
            WHERE a.id_profesor = '" . $id_profesor . "' AND a.id_actividad = " . $actividad['id_actividad']) or die(mysqli_error($con));

        echo "<script>document.location='salario_profesores.php'</script>";
    }
    echo "<script type='text/javascript'>alert('Ya se realizo el pago de este mes');</script>";
    echo "<script>document.location='salario_profesores.php'</script>";
}
