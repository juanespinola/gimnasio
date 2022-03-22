


<?php session_start();

include('../../dist/includes/dbcon.php');

$id_usuario = $_POST['id_usuario'];
$sueldo = $_POST['sueldo'];

mysqli_query($con, "UPDATE sueldo_empleado SET sueldo='$sueldo' WHERE id_usuario='$id_usuario'") or die(mysqli_error($con));

echo "<script type='text/javascript'>alert('categoria actualizada correctamente!');</script>";
echo "<script>document.location='asignar_sueldo.php'</script>";



?>
