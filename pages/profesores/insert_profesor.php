<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ruc = $_POST['ruc'];
$telefono = $_POST['telefono'];
$documento = $_POST['documento'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$query2 = mysqli_query($con, "select * from profesores where documento= '$documento'") or die(mysqli_error($con));
$count = mysqli_num_rows($query2);

if ($count > 0) {
    echo "<script type='text/javascript'>alert('Registro ya existente!');</script>";
    echo "<script>document.location='profesores.php'</script>";
} else {
    mysqli_query($con, "INSERT INTO profesores(nombre,apellido,ruc,telefono,documento,fecha_nacimiento)	VALUES('$nombre','$apellido','$ruc','$telefono','$documento', '$fecha_nacimiento')") or die(mysqli_error($con));
    echo "<script>document.location='profesores.php'</script>";
}
