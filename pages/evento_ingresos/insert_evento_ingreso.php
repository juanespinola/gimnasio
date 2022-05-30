<?php
session_start();
include('../../dist/includes/dbcon.php');
date_default_timezone_set('America/Asuncion');
$id_evento = $_GET['id_evento'];

if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}

if (!isset($_GET['id_evento'])) {
    echo "<script>document.location='../evento_ingresos/agregar_evento_ingreso.php?id_evento=$id_evento&status=9</script>";
    exit;
}

if ($_POST["monto_total"] == '') {
    echo "<script>document.location='../evento_ingresos/agregar_evento_ingreso.php?id_evento=$id_evento&status=7'</script>";
    exit;
}

if (empty($_POST['alumno_evento']) && (empty($_POST['nombre_cliente_evento']) || empty($_POST['documento_cliente_evento']))) {
    echo "<script>document.location='../evento_ingresos/agregar_evento_ingreso.php?id_evento=$id_evento&status=8'</script>";
    exit;
}

$id_usuario = $_SESSION['id'];
$id_cliente = empty($_POST['alumno_evento']) ? $_POST['alumno_evento'] : '';
$nombre_cliente = empty($_POST['nombre_cliente_evento']) ? $_POST['nombre_cliente_evento'] : '';
$documento_cliente = empty($_POST['documento_cliente_evento']) ? $_POST['documento_cliente_evento'] : '';
$fecha_actual = date("Y-m-d H:i:s");
$monto_total = $_POST['monto_total'];
$id_sucursal = empty($_SESSION['id_sucursal']) ? $_SESSION['id_sucursal'] : '';
$estado = 'pagado';


$sql = "INSERT INTO `evento_ventas` (`id_cliente`,`nombre_cliente`,`documento`,`fecha_actual`,`monto_total`,`id_usuario`,`id_evento`,`estado`)
    VALUES
    (
        NULLIF('" . $_POST['alumno_evento'] . "', ''),
        NULLIF('" . $_POST['nombre_cliente_evento'] . "', ''), 
        NULLIF('" . $_POST['documento_cliente_evento'] . "', ''), 
        '" . $fecha_actual . "',  
        '" . $monto_total . "',  
        NULLIF('" . $id_usuario . "', ''),  
        NULLIF('" . $_GET['id_evento'] . "', ''),  
        '" . $estado . "'
    );";

$insert = mysqli_query($con, $sql) or die(mysqli_error($con));
$id_evento_venta = mysqli_insert_id($con);

if ($insert) {
    foreach ($_SESSION['carrito_evento'] as $key => $value) {
        $cantidad = $value['cantidad'];
        $sql_1 =  "INSERT INTO `evento_ventas_detalle`
        (`id_evento_venta`,
        `id_evento_producto`,
        `cantidad`,
        `precio_unitario`,
        `precio_total`)
        VALUES
        ('" . $id_evento_venta . "',
        '" . $value['id_evento_producto'] . "',
        '" . $cantidad . "',
        '" . $value['precio_unitario'] . "',
        '" . $value['precio_total'] . "');";

        $detalle = mysqli_query($con, $sql_1);

        $update = mysqli_query($con, "UPDATE evento_productos 
                SET stock = stock - '$cantidad'
                WHERE id_evento_producto='" . $value['id_evento_producto'] . "' AND id_evento = '$id_evento'");
    }
    unset($_SESSION["carrito_evento"]);

    echo "<script>document.location='../evento_ingresos/evento_ingresos.php?id_evento=$id_evento'</script>";
} else {
    echo "<script>document.location='../evento_ingresos/evento_ingresos.php?id_evento=$id_evento'</script>";
}
