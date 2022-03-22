


<?php session_start();

include('../../dist/includes/dbcon.php');

if (isset($_REQUEST['id_usuario'])) {
  $id_usuario = $_REQUEST['id_usuario'];
} else {
  $id_usuario = $_POST['id_usuario'];
}
if (isset($_REQUEST['pago'])) {
  $pago = $_REQUEST['pago'];
} else {
  $pago = $_POST['pago'];
}


$fecha_pago = date('Y-m-d');


mysqli_query($con, "INSERT INTO sueldo_pago(fecha_pago,pago,id_usuario)	VALUES('$fecha_pago','$pago','$id_usuario')") or die(mysqli_error($con));
echo "<script>document.location='asignar_sueldo.php'</script>";



?>
