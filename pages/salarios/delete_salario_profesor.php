<?php session_start();
if (empty($_SESSION['id'])) :
    header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


if (isset($_REQUEST['id_sueldo_profesor'])) {
    $id_sueldo_profesor = $_REQUEST['id_sueldo_profesor'];
} else {
    $id_sueldo_profesor = $_POST['id_sueldo_profesor'];
}

$delete = mysqli_query($con, "DELETE FROM sueldo_profesores WHERE id_sueldo_profesor='$id_sueldo_profesor'") or die(mysqli_error($con));
echo "<script type='text/javascript'>alert('Registro eliminado correctamente!');</script>";
echo "<script>document.location='salario_profesores.php'</script>";
