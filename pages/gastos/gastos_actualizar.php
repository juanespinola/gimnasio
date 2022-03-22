


<?php session_start();
if(empty($_SESSION['id'])):
endif;
include('../../dist/includes/dbcon.php');
	
	$id_gastos = $_POST['id_gastos'];
		$fecha = $_POST['fecha'];
	$descripcion = $_POST['descripcion'];

	$cantidad = $_POST['cantidad'];
		$cantidad_antigua = $_POST['cantidad_antigua'];

    $update=mysqli_query($con,"update caja set monto=monto+'$cantidad_antigua' where estado='abierto' ");

    $update=mysqli_query($con,"update caja set monto=monto-'$cantidad' where estado='abierto' ");
    
	mysqli_query($con,"update gastos set fecha='$fecha',descripcion='$descripcion',cantidad='$cantidad' where id_gastos='$id_gastos'")or die(mysqli_error());

	echo "<script type='text/javascript'>alert('gastos actualizado correctamente!');</script>";
	echo "<script>document.location='gastos.php'</script>";
	


?>
