<?php
session_start();
include('../../dist/includes/dbcon.php');

$id_sueldo_profesor = $_POST['id_sueldo_profesor'];
$sueldo = $_POST['sueldo'];


mysqli_query($con, "UPDATE sueldo_profesores SET 
    salario='$sueldo'
WHERE id_sueldo_profesor='$id_sueldo_profesor'") or die(mysqli_error($con));

echo "<script type='text/javascript'>alert('Registro actualizado Correctamente!');</script>";
echo "<script>document.location='salario_profesores.php'</script>";
