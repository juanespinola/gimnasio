<?php session_start();
if (empty($_SESSION['id'])) :
    header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


if (isset($_REQUEST['id_asistencia_cliente'])) {
    $id_asistencia_cliente = $_REQUEST['id_asistencia_cliente'];
} else {
    $id_asistencia_cliente = $_POST['id_asistencia_cliente'];
}

$delete = mysqli_query($con, "DELETE FROM asistencia_clientes WHERE id_asistencia_cliente='$id_asistencia_cliente'") or die(mysqli_error($con));
if ($delete) {
    echo "<script type='text/javascript'>alert('Registro eliminado correctamente!');</script>";
    echo "<script>document.location='asistencias.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error eliminando la asistencia!');</script>";
    echo "<script>document.location='asistencias.php'</script>";
}
