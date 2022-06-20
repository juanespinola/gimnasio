<?php
session_start();
include('../../dist/includes/dbcon.php');

date_default_timezone_set("America/Asuncion");
$fecha_cierre = date('Y-m-d');
$id_sucursal = $_SESSION['id_sucursal'];


$caja_cierre = mysqli_query($con, "UPDATE caja SET 
estado='cerrado',
fecha_cierre='$fecha_cierre' 
WHERE estado='abierto' AND id_sucursal = '$id_sucursal'") or die(mysqli_error($con));

if ($caja_cierre) {
    echo "<script>document.location='caja.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error en el cierre de caja');</script>";
    echo "<script>document.location='caja.php'</script>";
}
