<?php
session_start();
include('../../dist/includes/dbcon.php');

date_default_timezone_set('America/Asuncion');
if (isset($_REQUEST['id_profesor'])) {
    $id_profesor = $_REQUEST['id_profesor'];
    if ($id_profesor == 0) {
        echo "<script type='text/javascript'>alert('Por favor, seleccione un profesor!');</script>";
        echo "<script>document.location='salario_profesores.php'</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Por favor, seleccione un profesor!');</script>";
    echo "<script>document.location='salario_profesores.php'</script>";
}

// TODO: falta una condicion en caso que se haya pagado parcialmente junto para el pago total
$fecha_pago = date("Y-m-d H:i:s");
$mes_actual = date("Y-m");
$cript = "SELECT * FROM sueldo_pago WHERE DATE_FORMAT(fecha_pago, '%Y-%m') = $mes_actual";
$sql = mysqli_query($con, "SELECT * FROM sueldo_pago WHERE DATE_FORMAT(fecha_pago, '%Y-%m') = '$mes_actual'") or die(mysqli_error($con));

if ($sql->num_rows > 0) {
    echo "<script type='text/javascript'>alert('Ya se realizo el pago de este mes');</script>";
    echo "<script>document.location='salario_profesores.php'</script>";
} else {
    $query = mysqli_query($con, "INSERT INTO sueldo_pago(fecha_pago,pago,id_profesor,id_actividad)
    SELECT 
    '$fecha_pago',
    sp.salario,
    a.id_profesor,
    a.id_actividad
    FROM sueldo_profesores sp
    LEFT JOIN actividades a ON sp.id_actividad = a.id_actividad
    LEFT JOIN deportes d ON a.id_deporte = d.id_deporte
    LEFT JOIN profesores p ON a.id_profesor = p.id_profesor
    LEFT JOIN clientes c ON a.id_cliente = c.id_cliente
    WHERE a.id_profesor = " . $id_profesor) or die(mysqli_error($con));

    echo "<script>document.location='salario_profesores.php'</script>";
}
