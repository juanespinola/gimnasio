<?php session_start();
if (empty($_SESSION['id'])) :
    header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


if (isset($_REQUEST['id_actividad'])) {
    $id_actividad = $_REQUEST['id_actividad'];
} else {
    $id_actividad = $_POST['id_actividad'];
}



$delete = mysqli_query($con, "DELETE FROM actividades WHERE id_actividad='$id_actividad'") or die(mysqli_error($con));
if ($delete) {
    $delete = mysqli_query($con, "DELETE FROM actividades_dias WHERE id_actividad='$id_actividad'") or die(mysqli_error($con));
    echo "<script type='text/javascript'>alert('Registro eliminado correctamente!');</script>";
    echo "<script>document.location='actividades.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Ocurrio un error eliminando el registro!');</script>";
    echo "<script>document.location='actividades.php'</script>";
}
