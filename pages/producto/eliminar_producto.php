<?php session_start();
if (empty($_SESSION['id'])) :
  header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


if (isset($_REQUEST['id_producto'])) {
  $id_producto = $_REQUEST['id_producto'];
} else {
  $id_producto = $_POST['id_producto'];
}



mysqli_query($con, "update producto set estado='sin stock', stock='0' where id_producto='$id_producto'") or die(mysqli_error($con));
echo "<script>document.location='../producto/producto.php'</script>";
