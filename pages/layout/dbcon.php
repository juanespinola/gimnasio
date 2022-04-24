<?php
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'gimnasio_cronos';
$con = mysqli_connect("db",$dbuser,$dbpass,$dbname);




// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


try{
	$base_de_datos = new PDO('mysql:host=db;dbname=' . $dbname, $dbuser, $dbpass);
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
