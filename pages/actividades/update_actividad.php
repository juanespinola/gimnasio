<?php
session_start();
include('../../dist/includes/dbcon.php');

$id_actividad = $_POST['id_actividad'];
$id_cliente = $_POST['alumno'];
$id_profesor = $_POST['profesor'];
$id_deporte = $_POST['deporte'];
$horario_inicio = $_POST['horario_inicio'];
$horario_final = $_POST['horario_final'];

$lunes =  isset($_POST['lunes']) ? $_POST['lunes'] : '0';
$martes = isset($_POST['martes']) ? $_POST['martes'] : '0';
$miercoles = isset($_POST['miercoles']) ? $_POST['miercoles'] : '0';
$jueves = isset($_POST['jueves']) ? $_POST['jueves'] : '0';
$viernes = isset($_POST['viernes']) ? $_POST['viernes'] : '0';
$sabado = isset($_POST['sabado']) ? $_POST['sabado'] : '0';
$domingo = isset($_POST['domingo']) ? $_POST['domingo'] : '0';

$update = mysqli_query($con, "UPDATE actividades SET 
    id_cliente='$id_cliente', 
    id_profesor='$id_profesor',
    id_deporte='$id_deporte', 
    horario_inicio='$horario_inicio', 
    horario_final='$horario_final' 
WHERE id_actividad='$id_actividad'") or die(mysqli_error($con));

if ($update) {
    $sql = mysqli_query($con, "UPDATE actividades_dias SET 
    lunes='$lunes', 
    martes='$martes',
    miercoles='$miercoles', 
    jueves='$jueves', 
    viernes='$viernes',
    sabado='$sabado',
    domingo='$domingo'
WHERE id_actividad='$id_actividad'") or die(mysqli_error($con));
    echo "<script type='text/javascript'>alert('Registro actualizado Correctamente!');</script>";
    echo "<script>document.location='actividades.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error en el registro de actividades dias');</script>";
    echo "<script>document.location='actividades.php'</script>";
}
