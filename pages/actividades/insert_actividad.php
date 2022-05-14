<?php
session_start();
include('../../dist/includes/dbcon.php');


$id_cliente = $_POST['alumno'];
$id_profesor = $_POST['profesor'];
$id_deporte = $_POST['deporte'];
$id_dia = $_POST['dia'];
$horario_inicio = $_POST['horario_inicio'];
$horario_final = $_POST['horario_final'];
$id_plan = $_POST['plan'];
$id_sucursal = $_SESSION['id_sucursal'];

$lunes =  isset($_POST['lunes']) ? $_POST['lunes'] : '0';
$martes = isset($_POST['martes']) ? $_POST['martes'] : '0';
$miercoles = isset($_POST['miercoles']) ? $_POST['miercoles'] : '0';
$jueves = isset($_POST['jueves']) ? $_POST['jueves'] : '0';
$viernes = isset($_POST['viernes']) ? $_POST['viernes'] : '0';
$sabado = isset($_POST['sabado']) ? $_POST['sabado'] : '0';
$domingo = isset($_POST['domingo']) ? $_POST['domingo'] : '0';

if (!isset($_POST['alumno']) || empty($_POST['alumno'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la alumno"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Alumno!');</script>";
    echo "<script>document.location='agregar_actividad.php'</script>";
}

if (!isset($_POST['profesor']) || empty($_POST['profesor'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la profesor"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Profesor!');</script>";
    echo "<script>document.location='agregar_actividad.php'</script>";
}

if (!isset($_POST['deporte']) || empty($_POST['deporte'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la deporte"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Deporte!');</script>";
    echo "<script>document.location='agregar_actividad.php'</script>";
}

// if (!isset($_POST['dia']) || empty($_POST['dia'])) {
//     // print(json_encode(array("status" => "error", "reason" => "No se recibe la dia"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
//     // exit();
//     echo "<script type='text/javascript'>alert('No se recibe la Dia!');</script>";
//     echo "<script>document.location='agregar_actividad.php'</script>";
// }

if (!isset($_POST['horario_inicio']) || empty($_POST['horario_inicio'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la horario_inicio"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Horario Inicio!');</script>";
    echo "<script>document.location='agregar_actividad.php'</script>";
}

if (!isset($_POST['horario_final']) || empty($_POST['horario_final'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la horario_final"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Horario Final!');</script>";
    echo "<script>document.location='agregar_actividad.php'</script>";
}

if (!isset($_POST['plan']) || empty($_POST['plan'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la horario_final"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe el plan!');</script>";
    echo "<script>document.location='agregar_actividad.php'</script>";
}

$select = mysqli_query($con, "SELECT * 
    FROM actividades 
    WHERE id_profesor = $id_profesor 
    AND id_cliente = $id_cliente 
    AND id_deporte = $id_deporte") or die(mysqli_error($con));


if ($select->num_rows >= 1) {
    echo "<script type='text/javascript'>alert('El registro ya existe!');</script>";
    echo "<script>document.location='actividades.php'</script>";
} else {
    $insert = mysqli_query($con, "INSERT INTO actividades(id_cliente, id_profesor, id_deporte, horario_inicio, horario_final, id_plan, id_sucursal) 
    VALUES ('$id_cliente', '$id_profesor','$id_deporte','$horario_inicio','$horario_final', '$id_plan', '$id_sucursal')") or die(mysqli_error($con));
    $id_actividad = mysqli_insert_id($con);

    if ($insert) {
        $sql = mysqli_query($con, "INSERT INTO actividades_dias(id_actividad, lunes, martes, miercoles, jueves, viernes, sabado, domingo) 
    VALUES ('$id_actividad', '$lunes','$martes','$miercoles','$jueves', '$viernes','$sabado','$domingo')") or die(mysqli_error($con));
        echo "<script>document.location='actividades.php'</script>";
    } else {
        echo "<script type='text/javascript'>alert('Ocurrio un error en el registro de dias');</script>";
        echo "<script>document.location='actividades.php'</script>";
    }
}
