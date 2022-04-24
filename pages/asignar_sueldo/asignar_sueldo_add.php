


<?php session_start();

include('../../dist/includes/dbcon.php');


$sueldo = $_POST['sueldo'];
$id_usuario = $_POST['id_usuario'];
if ($id_usuario == "") {
	echo "Seleccione un tipo de usuario";
	exit;
}

$query2 = mysqli_query($con, "select * from sueldo_empleado where id_usuario='$id_usuario'") or die(mysqli_error($con));
$count = mysqli_num_rows($query2);

if ($count > 0) {
	echo "<script type='text/javascript'>alert('usuario ya existe!');</script>";
	echo "<script>document.location='asignar_sueldo.php'</script>";
} else {
	mysqli_query($con, "INSERT INTO sueldo_empleado(id_usuario,sueldo) VALUES('$id_usuario','$sueldo')") or die(mysqli_error($con));
}
// mysqli_query($con,"update usuario set estado_planilla='si' where id='$idusuario'")or die(mysqli_error($con));
echo "<script>document.location='asignar_sueldo.php'</script>";



?>
