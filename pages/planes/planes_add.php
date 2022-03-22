<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];
$nombre_plan = $_POST['nombre_plan'];
$tipo_tiempo = $_POST['tipo_tiempo'];
$descripcion = $_POST['descripcion'];
$numero_tiempo = $_POST['numero_tiempo'];

$precio = $_POST['precio'];

mysqli_query($con, "INSERT INTO planes(nombre_plan, tipo_tiempo,numero_tiempo,descripcion,precio)
				VALUES('$nombre_plan', '$tipo_tiempo','$numero_tiempo','$descripcion','$precio')") or die(mysqli_error($con));

echo "<script>document.location='planes.php'</script>";
