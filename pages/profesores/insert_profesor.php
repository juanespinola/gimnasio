<?php
session_start();
include('../../dist/includes/dbcon.php');


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$ruc = $_POST['ruc'];
$telefono = $_POST['telefono'];
$documento = $_POST['documento'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_sucursal = $_SESSION['id_sucursal'];

$query2 = mysqli_query($con, "SELECT * FROM profesores WHERE documento= '$documento'") or die(mysqli_error($con));
$count = mysqli_num_rows($query2);

if ($count > 0) {
    echo "<script type='text/javascript'>alert('Registro ya existente!');</script>";
    echo "<script>document.location='profesores.php'</script>";
} else {
    mysqli_query($con, "INSERT INTO profesores(nombre, apellido, ruc, telefono, documento, fecha_nacimiento, id_sucursal, email)
        VALUES('$nombre','$apellido','$ruc','$telefono','$documento', '$fecha_nacimiento', '$id_sucursal', '$email')") or die(mysqli_error($con));
    echo "<script>document.location='profesores.php'</script>";
}
