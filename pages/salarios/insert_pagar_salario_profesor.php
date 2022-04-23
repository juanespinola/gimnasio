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

$fecha_pago = date("Y-m-d H:i:s");
$mes_actual = date("Y-m");

$sql = mysqli_query($con, "SELECT * 
    FROM sueldo_pago sp
    JOIN actividades a ON sp.id_actividad = a.id_actividad
    WHERE DATE_FORMAT(sp.fecha_pago, '%Y-%m')  = '$mes_actual'
    AND a.id_actividad = $id_actividad") or die(mysqli_error($con));
if ($sql->num_rows > 0) {
    echo "<script type='text/javascript'>alert('Ya se realizo el pago de este mes');</script>";
    echo "<script>document.location='salario_profesores.php'</script>";
} else {
    mysqli_query($con, "INSERT INTO sueldo_pago(fecha_pago,pago,id_profesor,id_actividad)VALUES('$fecha_pago','$sueldo','$id_profesor', '$id_actividad')") or die(mysqli_error($con));
    echo "<script>document.location='salario_profesores.php'</script>";
}
