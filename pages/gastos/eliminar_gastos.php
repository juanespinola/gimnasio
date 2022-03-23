<?php session_start();
if (empty($_SESSION['id'])) :
  header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');

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


$update = mysqli_query($con, "update caja set monto=monto+'$cantidad' where estado='abierto'");

mysqli_query($con, "delete from gastos where id_gastos='$id_gasto'") or die(mysqli_error($con));
echo "<script type='text/javascript'>alert('Eliminado correctamente!');</script>";
echo "<script>document.location='gastos.php'</script>";
