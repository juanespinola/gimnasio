<?php
session_start();
include('../../dist/includes/dbcon.php');

if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}

date_default_timezone_set('America/Asuncion');
if ($_POST["monto_total"] == '') {
    echo "<script>document.location='../ventas/agregar_venta.php?status=7'</script>";
    exit;
}

if (empty($_POST['alumno']) && (empty($_POST['nombre_cliente']) || empty($_POST['documento_cliente']))) {
    echo "<script>document.location='../ventas/agregar_venta.php?status=8'</script>";
    exit;
}

$id_usuario = $_SESSION['id'];
$id_cliente = empty($_POST['alumno']) ? $_POST['alumno'] : '';
$nombre_cliente = empty($_POST['nombre_cliente']) ? $_POST['nombre_cliente'] : '';
$documento_cliente = empty($_POST['documento_cliente']) ? $_POST['documento_cliente'] : '';
$fecha_actual = date("Y-m-d H:i:s");
$monto_total = $_POST['monto_total'];
$id_empresa = empty($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : '';
$id_sucursal = empty($_SESSION['id_sucursal']) ? $_SESSION['id_sucursal'] : '';
$estado = 'pagado';


$sql = "INSERT INTO `ventas` (`id_cliente`,`nombre_cliente`,`documento`,`fecha_actual`,`monto_total`,`id_usuario`,`id_empresa`,`id_sucursal`,`estado`)
    VALUES
    (
        NULLIF('" . $_POST['alumno'] . "', ''),
        NULLIF('" . $_POST['nombre_cliente'] . "', ''), 
        NULLIF('" . $_POST['documento_cliente'] . "', ''), 
        '" . $fecha_actual . "',  
        '" . $monto_total . "',  
        NULLIF('" . $id_usuario . "', ''),  
        NULLIF('" . $_POST['id_empresa'] . "', ''),  
        NULLIF('" . $_SESSION['id_sucursal'] . "', ''), 
        '" . $estado . "'
    );";

$insert = mysqli_query($con, $sql) or die(mysqli_error($con));
$id_venta = mysqli_insert_id($con);

if ($insert) {
    foreach ($_SESSION['carrito'] as $key => $value) {
        $cantidad = $value['cantidad'];
        $detalle = mysqli_query($con, "INSERT INTO `ventas_detalle`
            (`id_venta`,
            `id_producto`,
            `cantidad`,
            `precio_unitario`,
            `precio_total`)
            VALUES
            ('" . $id_venta . "',
            '" . $value['id_producto'] . "',
            '" . $cantidad . "',
            '" . $value['precio_unitario'] . "',
            '" . $value['precio_total'] . "');");

        $update = mysqli_query($con, "UPDATE producto 
                SET stock = stock - '$cantidad'
                WHERE id_producto='" . $value['id_producto'] . "'");
    }
    unset($_SESSION["carrito"]);
    $update = mysqli_query($con, "UPDATE caja 
            SET monto = monto+'$monto_total' 
            WHERE estado='abierto'");
    echo "<script>document.location='../ventas/agregar_venta.php?status=1'</script>";
} else {
    echo "<script>document.location='../ventas/agregar_venta.php?status=6'</script>";
}
