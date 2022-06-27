<?php
session_start();
include('../../dist/includes/dbcon.php');

if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}

date_default_timezone_set('America/Asuncion');

if ($_POST["id_actividad"] == '') {
    echo "<script>document.location='../cuotas/cuotas.php'</script>";
    exit;
}

$id_actividad = $_POST["id_actividad"];
$id_metodo_pago = $_POST["metodo_pago"];
$nro_comprobante = ($_POST["nro_comprobante"]) ? $_POST["nro_comprobante"] : NULL;
$fecha_actual = date("Y-m-d H:i:s");
$nro_cuotas = mysqli_query($con, "SELECT nro_cuota, fecha_fin FROM cuotas WHERE id_actividad = '$id_actividad' AND fecha_pago IS NULL");
while ($row = mysqli_fetch_array($nro_cuotas)) {
    $nro_cuota = $row['nro_cuota'];
    $fecha_fin = $row['fecha_fin'];
}

$sql = "UPDATE `cuotas` SET 
            id_metodo_pago = '$id_metodo_pago',
            fecha_pago = '$fecha_actual',
            estado='pagado'";
if ($nro_comprobante != "") {
    $sql .= ",nro_comprobante='$nro_comprobante'";
}
$sql .= "WHERE id_actividad = '$id_actividad' AND fecha_pago IS NULL";

$update = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($update) {
    $sgte_cuota = $nro_cuota + 1;
    $cuota = mysqli_query($con, "INSERT INTO cuotas (id_actividad, fecha_inicio, fecha_fin, nro_cuota, estado) 
    VALUES ('$id_actividad', '$fecha_fin', DATE_ADD('$fecha_fin', INTERVAL 30 DAY), '$sgte_cuota', 'activo')");
    echo "<script>document.location='../cuotas/cuotas.php'</script>";
}
