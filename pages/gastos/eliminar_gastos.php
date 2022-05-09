<?php session_start();
if (empty($_SESSION['id'])) :
  header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


$query = mysqli_query($con, "SELECT * FROM caja WHERE estado = 'abierto'") or die(mysqli_error($con));

if ($query->num_rows == 0) {
  echo "<script type='text/javascript'>alert('Debe contar con una caja activa!');</script>";
  echo "<script>document.location='../layout/inicio.php'</script>";
  exit;
}



if (isset($_REQUEST['id_gasto'])) {
  $id_gasto = $_REQUEST['id_gasto'];
} else {
  $id_gasto = $_POST['id_gasto'];
}
if (isset($_REQUEST['cantidad'])) {
  $cantidad = $_REQUEST['cantidad'];
} else {
  $cantidad = $_POST['cantidad'];
}


$update = mysqli_query($con, "UPDATE caja SET monto=monto+'$cantidad' WHERE estado='abierto'");

mysqli_query($con, "DELETE FROM gastos WHERE id_gastos='$id_gasto'") or die(mysqli_error($con));
echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
echo "<script>document.location='gastos.php'</script>";
