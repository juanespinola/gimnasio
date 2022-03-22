<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ruc = $_POST['ruc'];
$telefono = $_POST['telefono'];
$dni = $_POST['dni'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$query2 = mysqli_query($con, "select * from clientes where dni='$dni'") or die(mysqli_error($con));
$count = mysqli_num_rows($query2);

if ($count > 0) {
	echo "<script type='text/javascript'>alert('dni ya existe!');</script>";
	echo "<script>document.location='cliente.php'</script>";
} else {
	mysqli_query($con, "INSERT INTO clientes(nombre,apellido,ruc,telefono,dni,fecha_nacimiento)
				VALUES('$nombre','$apellido','$ruc','$telefono','$dni', '$fecha_nacimiento')") or die(mysqli_error($con));
	echo "<script>document.location='cliente.php'</script>";
}
