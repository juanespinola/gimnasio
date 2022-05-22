<?php
// include_once('conexion.php');
// class Procesar extends Model
// {

// 	public function __construct()
// 	{
// 		parent::__construct();
// 	}

// 	public function build_report($year)
// 	{
// 		$total = array();
// 		for ($i = 0; $i < 12; $i++) {

// 			$total[$i] = 0;
// 		}
// 		return $total;
// 	}
// }

if ($_POST['profesor']) {
	getProfesores();
}


function getProfesores()
{
	include('../../../dist/includes/dbcon.php');
	$profesor = array();
	$query = mysqli_query($con, "SELECT 
	count(a.id_cliente) as cant_alumnos,
	concat(p.nombre,' ', p.apellido) as profesor
	FROM actividades a
	JOIN profesores p ON a.id_profesor = p.id_profesor
	GROUP BY profesor");
	while ($row = mysqli_fetch_array($query)) {
		$profesor[] = array(
			"cant_alumnos" => $row['cant_alumnos'],
			"profesor" => utf8_encode($row['profesor']),
		);
	}

	$json = array('data' => $profesor, 'total' => $query->num_rows);
	print(json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
	exit;
}
