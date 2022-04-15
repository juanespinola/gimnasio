<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];

$id_deporte = $_POST['id_deporte'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];


mysqli_query($con, "UPDATE deportes SET descripcion='$descripcion', estado='$estado' WHERE id_deporte='$id_deporte'") or die(mysqli_error($con));

echo "<script type='text/javascript'>alert('Registro actualizado Correctamente!');</script>";
echo "<script>document.location='deportes.php'</script>";
