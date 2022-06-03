<?php session_start();
if (empty($_SESSION['id'])) :
    header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


if (isset($_REQUEST['id_recordatorio'])) {
    $id_recordatorio = $_REQUEST['id_recordatorio'];
} else {
    $id_recordatorio = $_POST['id_recordatorio'];
}

$delete = mysqli_query($con, "DELETE FROM recordatorios WHERE id_recordatorio='$id_recordatorio'") or die(mysqli_error($con));
if ($delete) {
    echo "<script type='text/javascript'>alert('Registro eliminado correctamente!');</script>";
    echo "<script>document.location='recordatorios.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error eliminando el recordatorio!');</script>";
    echo "<script>document.location='recordatorios.php'</script>";
}
