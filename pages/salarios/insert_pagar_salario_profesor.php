<?php session_start();
if (empty($_SESSION['id'])) :
    header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');

if (isset($_REQUEST['id_profesor'])) {
    $id_profesor = $_REQUEST['id_profesor'];
} else {
    $id_profesor = $_POST['id_profesor'];
}

if (isset($_REQUEST['sueldo'])) {
    $sueldo = $_REQUEST['sueldo'];
} else {
    $sueldo = $_POST['sueldo'];
}

if (isset($_REQUEST['id_actividad'])) {
    $id_actividad = $_REQUEST['id_actividad'];
} else {
    $id_actividad = $_POST['id_actividad'];
}

$fecha_pago = date('Y-m-d');

mysqli_query($con, "INSERT INTO sueldo_pago(fecha_pago,pago,id_profesor,id_actividad)VALUES('$fecha_pago','$sueldo','$id_profesor', '$id_actividad')") or die(mysqli_error($con));
echo "<script>document.location='salario_profesores.php'</script>";
