<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$id_sucursal = $_POST['sucursal'];
$total = 0;

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if ($tipo == "") {
	echo "<script type='text/javascript'>alert('Seleccione un tipo de Usuario!');</script>";
	echo "<script>document.location='usuario.php'</script>";
	exit;
}

if ($id_sucursal == 0) {
	echo "<script type='text/javascript'>alert('Elija una sucursal!');</script>";
	echo "<script>document.location='usuario.php'</script>";
	exit;
}

if ($password == $password2) {
	$query2 = mysqli_query($con, "SELECT * FROM usuario WHERE usuario='$usuario'") or die(mysqli_error($con));
	$count = mysqli_num_rows($query2);

	if ($count > 0) {
		echo "<script type='text/javascript'>alert('usuario ya existe!');</script>";
		echo "<script>document.location='usuario.php'</script>";
	} else {

		if (!empty($_FILES['imagen']['name'])) {


			$target_dir = "subir_us/";
			$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			//check if image file is a actual image or fake image
			$check = getimagesize($_FILES["imagen"]["tmp_name"]);
			if ($check !== false) {
				echo "archivo es una imagen - " . $check["mime"] . ".";
				$uploadok = 1;
			} else {
				echo "el archivo no es una imagen.";
				$uploadok = 0;
			}


			//check if file already exists
			if (file_exists($target_file)) {
				echo "lo siento, el archivo ya existe.";
				$uploadok = 0;
			}

			//check file size
			if ($_FILES["imagen"]["size"] > 500000) {
				echo "lo siento, tu archivo es demasiado grande.";
				$uploadok = 0;
			}



			if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {

				$img = basename($_FILES["imagen"]["name"]);

				//encriptando contraseña
				$pass = md5($password);
				$salt = "a1Bz20ydqelm8m1wql";
				$pass = $salt . $pass;
				///finzalizo encriptacion


				mysqli_query($con, "INSERT INTO usuario(usuario, password, imagen, tipo, nombre, apellido, telefono, correo, estado, id_sucursal)
				VALUES('$usuario','$pass','$img','$tipo','$nombre','$apellido','$telefono','$correo','activo', '$id_sucursal')") or die(mysqli_error($con));


				echo "<script>document.location='usuario.php'</script>";
			} else {
				echo "No se pudo subir.";
			}
		} else {
			$pass = md5($password);
			$salt = "a1Bz20ydqelm8m1wql";
			$pass = $salt . $pass;


			mysqli_query($con, "INSERT INTO usuario(usuario, password, imagen, tipo, nombre, apellido, telefono, correo, estado, id_sucursal)
				VALUES('$usuario','$pass','$img','$tipo','$nombre','$apellido','$telefono','$correo','activo', '$id_sucursal')") or die(mysqli_error($con));

			echo "<script>document.location='usuario.php'</script>";
		}
	}
} else {
	echo "<script type='text/javascript'>alert('Error Las contraseñas no coinciden registre de nuevo!');</script>";
}
