 <?php
	session_start();
	include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];

	$id_cliente = $_POST['id_cliente'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$ruc = $_POST['ruc'];
	$dni = $_POST['dni'];
	$telefono = $_POST['telefono'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];

	mysqli_query($con, "update clientes set nombre='$nombre',apellido='$apellido',ruc='$ruc',telefono='$telefono',dni='$dni',fecha_nacimiento='$fecha_nacimiento' where id_cliente='$id_cliente'") or die(mysqli_error($con));

	echo "<script type='text/javascript'>alert(' actualizado correctamente!');</script>";
	echo "<script>document.location='cliente.php'</script>";


	?>