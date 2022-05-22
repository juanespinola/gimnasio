<?php

// include('../layout/dbcon.php');


$searchTerm = $_GET['searchTerm'];
$pageSize = $_GET['pageSize'];
$pageNum = $_GET['pageNum'];
$searchTerm = preg_replace("/[^a-zA-Z0-9 ]+/", "", $searchTerm);


switch ($_GET['action']) {
    case 'alumno':
        getAlumnos($searchTerm['term']);
        break;
    case 'profesor':
        getProfesores($searchTerm['term']);
        break;

    default:
        echo "no ingresamos aca";
        break;
}


function getAlumnos($param)
{
    include('../layout/dbcon.php');
    $cliente = array();
    $query = mysqli_query($con, "SELECT * FROM clientes WHERE dni LIKE '%$param%'");
    while ($row = mysqli_fetch_array($query)) {
        $cliente[] = array(
            "id" => $row['id_cliente'],
            "text" => utf8_encode($row['nombre']) . ' ' . utf8_encode($row['apellido']),
        );
    }

    $json = array('data' => $cliente, 'total' => $query->num_rows);
    print(json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    exit;
}

function getProfesores($param)
{
    include('../layout/dbcon.php');


    $profesor = array();
    $query = mysqli_query($con, "SELECT * FROM profesores WHERE nombre LIKE '%$param%'");
    while ($row = mysqli_fetch_array($query)) {
        $profesor[] = array(
            "id" => $row['id_profesor'],
            "text" => utf8_encode($row['nombre']) . ' ' . utf8_encode($row['apellido']),
        );
    }

    $json = array('data' => $profesor, 'total' => $query->num_rows);
    print(json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    exit;
}



// $html = '';
// $key = $_POST['key'];

// $result = $con->query('SELECT * FROM clientes WHERE  nombre LIKE "%' . strip_tags($key) . '%"');
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $html .= '<div><a class="suggest-element" data="' . utf8_encode($row['nombre']) . '" id="cliente' . $row['id_cliente'] . '">' . utf8_encode($row['nombre']) . '</a></div>';
//     }
// }
// echo $html;
