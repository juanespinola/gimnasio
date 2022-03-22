 <?php
	session_start();
	include('../../dist/includes/dbcon.php');
	//$branch=$_SESSION['branch'];

	$id_plan = $_POST['id_plan'];
	$nombre_plan = $_POST['nombre_plan'];
	$tipo_tiempo = $_POST['tipo_tiempo'];
	$descripcion = $_POST['descripcion'];
	$numero_tiempo = $_POST['numero_tiempo'];
	$precio = $_POST['precio'];





	///finzalizo encriptacion


	mysqli_query($con, "update planes set nombre_plan='$nombre_plan', tipo_tiempo='$tipo_tiempo',descripcion='$descripcion',numero_tiempo='$numero_tiempo',precio='$precio' where id_plan='$id_plan'") or die(mysqli_error($con));



	echo "<script type='text/javascript'>alert(' actualizado correctamente!');</script>";
	echo "<script>document.location='planes.php'</script>";














	?>
