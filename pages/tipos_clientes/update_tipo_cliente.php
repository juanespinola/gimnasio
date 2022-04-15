<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];

$id_tipo_cliente = $_POST['id_tipo_cliente'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];


mysqli_query($con, "UPDATE tipos_clientes SET descripcion='$descripcion', estado='$estado' WHERE id_tipo_cliente='$id_tipo_cliente'") or die(mysqli_error($con));

echo "<script type='text/javascript'>alert('Registro actualizado Correctamente!');</script>";
echo "<script>document.location='tipos_clientes.php'</script>";
