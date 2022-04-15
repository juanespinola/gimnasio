<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];

$id_cliente = $_POST['alumno'];
$id_profesor = $_POST['profesor'];
$id_deporte = $_POST['deporte'];
$sueldo = $_POST['sueldo'];

// print_r($_POST);


if (!isset($_POST['alumno']) || empty($_POST['alumno'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la alumno"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Alumno!');</script>";
    echo "<script>document.location='agregar_salario_profesor.php'</script>";
}

if (!isset($_POST['profesor']) || empty($_POST['profesor'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la profesor"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Profesor!');</script>";
    echo "<script>document.location='agregar_salario_profesor.php'</script>";
}

if (!isset($_POST['deporte']) || empty($_POST['deporte'])) {
    // print(json_encode(array("status" => "error", "reason" => "No se recibe la deporte"), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    // exit();
    echo "<script type='text/javascript'>alert('No se recibe la Deporte!');</script>";
    echo "<script>document.location='agregar_salario_profesor.php'</script>";
}

if (!isset($_POST['sueldo']) || empty($_POST['sueldo'])) {
    echo "<script type='text/javascript'>alert('No se recibe la Deporte!');</script>";
    echo "<script>document.location='agregar_salario_profesor.php'</script>";
}

// mysqli_query($con, "INSERT INTO sueldo_profesores(id_actividad, salario) 
//     VALUES ('$id_cliente', '$id_profesor','$id_deporte','$horario_inicio','$horario_final','$id_dia')") or die(mysqli_error($con));
// echo "<script>document.location='salario_profesores.php'</script>";
// mysqli_query($con, "INSERT INTO sueldo_profesores(id_actividad, salario) 
// SELECT id_actividad FROM actividades WHERE id_profesor = $id_profesor AND id_cliente = $id_cliente AND id_deporte = $id_deporte");
// echo "<script>document.location='salario_profesores.php'</script>";


$query = mysqli_query($con, "SELECT id_actividad FROM actividades WHERE id_profesor = $id_profesor AND id_cliente = $id_cliente AND id_deporte = $id_deporte") or die(mysqli_error($con));
// echo "<pre>";
// print_r($query);
// echo "</pre>";
if ($query->num_rows == 0) {
    while ($row = mysqli_fetch_array($query)) {
        $id_actividad = $row['id_actividad'];
        mysqli_query($con, "INSERT INTO sueldo_profesores(id_actividad, salario) VALUES ('$id_actividad', '$sueldo')") or die(mysqli_error($con));
        echo "<script>document.location='salario_profesores.php'</script>";
    }
} else if ($query->num_rows >= 1) {
    echo "<script type='text/javascript'>alert('Registro existente!');</script>";
    echo "<script>document.location='agregar_salario_profesor.php'</script>";
} else {
    echo "<script type='text/javascript'>alert('Registro no existente!');</script>";
    echo "<script>document.location='agregar_salario_profesor.php'</script>";
}
