<?php
session_start();
include('../../dist/includes/dbcon.php');

date_default_timezone_set("America/Asuncion");
$fecha_cierre = date('Y-m-d');

mysqli_query($con, "UPDATE caja SET estado='cerrado',fecha_cierre='$fecha_cierre'  where estado='abierto'") or die(mysqli_error($con));

echo "<script>document.location='caja.php'</script>";
