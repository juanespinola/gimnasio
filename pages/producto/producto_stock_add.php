<?php 
session_start();
include('../../dist/includes/dbcon.php');
if (empty($_SESSION['id'])) {
  echo "<script>document.location='../../index.php'</script>";
}



$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];
$update = mysqli_query($con, "UPDATE producto SET stock=stock+'$cantidad' WHERE id_producto='$id_producto' ");

echo "<script>document.location='../producto/producto.php'</script>";
