<?php
session_start();
include('../../dist/includes/dbcon.php');


$descripcion = $_POST['descripcion_evento'];
$fecha_inicio = $_POST['fecha_inicio_evento'];
$fecha_fin = $_POST['fecha_final_evento'];
$id_sucursal = $_POST['sucursal_evento'];



if (!isset($_POST['descripcion_evento']) || empty($_POST['descripcion_evento'])) {

    echo "<script type='text/javascript'>alert('No se recibe la descripcion!');</script>";
    echo "<script>document.location='agregar_evento.php'</script>";
}

if (!isset($_POST['fecha_inicio_evento']) || empty($_POST['fecha_inicio_evento'])) {

    echo "<script type='text/javascript'>alert('No se recibe la fecha de inicio!');</script>";
    echo "<script>document.location='agregar_evento.php'</script>";
}

if (!isset($_POST['fecha_final_evento']) || empty($_POST['fecha_final_evento'])) {

    echo "<script type='text/javascript'>alert('No se recibe la fecha final!');</script>";
    echo "<script>document.location='agregar_evento.php'</script>";
}


if (!isset($_POST['sucursal_evento']) || empty($_POST['sucursal_evento'])) {

    echo "<script type='text/javascript'>alert('No se recibe la sucursal!');</script>";
    echo "<script>document.location='agregar_evento.php'</script>";
}


$insert = mysqli_query($con, "INSERT INTO eventos(descripcion, fecha_inicio, fecha_fin, id_sucursal, estado) 
    VALUES ('$descripcion', '$fecha_inicio','$fecha_fin','$id_sucursal','activo')") or die(mysqli_error($con));

if ($insert) {
    echo "<script>document.location='eventos.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error en el registro de eventos');</script>";
    echo "<script>document.location='eventos.php'</script>";
}
