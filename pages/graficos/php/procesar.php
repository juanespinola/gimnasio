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

if ($_POST['eventos']) {
	eventos_ingresos_egresos();
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

function eventos_ingresos_egresos()
{
	include('../../../dist/includes/dbcon.php');
	$eventos = array();
	$query = mysqli_query($con, "SELECT 
	e.descripcion,
	e.fecha_fin,
	(SELECT SUM(monto_total) FROM evento_ventas ev WHERE e.id_evento = ev.id_evento) as suma_ingresos,
	(SELECT SUM(cantidad) FROM evento_gastos eg WHERE e.id_evento = eg.id_evento) as suma_egresos
	FROM eventos e
	WHERE e.estado = 'finalizado'");

	while ($row = mysqli_fetch_array($query)) {
		$eventos[] = array(
			"evento" => $row['descripcion'],
			"ingreso" => $row['suma_ingresos'],
			"egreso" => $row['suma_egresos'],
		);
	}

	$json = array('data' => $eventos);
	print(json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
	exit;
}
