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
	$estado = $_POST['estado'];
	$email = $_POST['email'];

	$update_cliente = mysqli_query($con, "UPDATE clientes SET 
		nombre='$nombre',
		apellido='$apellido',
		ruc='$ruc',
		telefono='$telefono',
		dni='$dni',
		fecha_nacimiento='$fecha_nacimiento',
		estado='$estado',
		email = '$email'
	WHERE id_cliente='$id_cliente'") or die(mysqli_error($con));

	if ($update_cliente) {
		echo "<script type='text/javascript'>alert('Registro Actualizado Correctamente!');</script>";
		echo "<script>document.location='cliente.php'</script>";
	} else {
		echo "<script type='text/javascript'>alert('Ocurrió un error al actualizar Cliente!');</script>";
		echo "<script>document.location='cliente.php'</script>";
	}

	?>
