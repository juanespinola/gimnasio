<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];
$id_profesor = $_POST['id_profesor'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ruc = $_POST['ruc'];
$documento = $_POST['documento'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$estado = $_POST['estado'];
$email = $_POST['email'];

$update_profesor = mysqli_query($con, "UPDATE profesores SET 
    nombre='$nombre',
    apellido='$apellido',
    ruc='$ruc',
    telefono='$telefono',
    documento='$documento',
    fecha_nacimiento='$fecha_nacimiento',
    estado='$estado',
    email='$email'
    WHERE id_profesor='$id_profesor'") or die(mysqli_error($con));
if ($update_profesor) {
    echo "<script type='text/javascript'>alert('Registro Actualizado Correctamente!');</script>";
    echo "<script>document.location='profesores.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrió un error al actualizar el Profesor!');</script>";
    echo "<script>document.location='profesores.php'</script>";
}
