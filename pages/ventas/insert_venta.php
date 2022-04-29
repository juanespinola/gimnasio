<?php
session_start();
include('../../dist/includes/dbcon.php');
date_default_timezone_set('America/Asuncion');
if (!isset($_POST["monto_total"])) {
    return;
}

$id_usuario = $_SESSION['id'];
$id_cliente = isset($_POST['alumno']) ? $_POST['alumno'] : NULL;
unset($id_cliente);
$nombre_cliente = isset($_POST['nombre_cliente']) ? $_POST['nombre_cliente'] : NULL;
$documento_cliente = isset($_POST['documento_cliente']) ? $_POST['documento_cliente'] : NULL;
$fecha_actual = date("Y-m-d H:i:s");
$monto_total = $_POST['monto_total'];
$id_empresa = isset($_POST['id_empresa']) ? $_POST['id_empresa'] : NULL;
$id_sucursal = isset($_POST['id_sucursal']) ? $_POST['id_sucursal'] : NULL;
$estado = 'pagado';

echo '<pre>';
print_r($_SESSION);
echo '<pre>';

echo '<pre>';
print_r($_POST);
echo '<pre>';

echo 'id_cliente<br>';
print_r($id_cliente);

// todo: queda realizar el insert de la venta, no acepta las variables que estan en null
$sql = "INSERT INTO `ventas`
(
`id_cliente`,
`nombre_cliente`,
`documento`,
`fecha_actual`,
`monto_total`,
`id_usuario`,
`id_empresa`,
`id_sucursal`,
`estado`)
VALUES
(" . $id_cliente . ", 
'" . $nombre_cliente . "', 
'" . $documento_cliente . "', 
'" . $fecha_actual . "',  
'" . $monto_total . "',  
" . $id_usuario . ",  
" . $id_empresa . ",  
" . $id_sucursal . ", 
'" . $estado . "');";
echo $sql;

// $insert = mysqli_query($con, "INSERT INTO `ventas`
// (
// `id_cliente`,
// `nombre_cliente`,
// `documento`,
// `fecha_actual`,
// `monto_total`,
// `id_usuario`,
// `id_empresa`,
// `id_sucursal`,
// `estado`)
// VALUES
// (" . $id_cliente . ", 
// '" . $nombre_cliente . "', 
// '" . $documento_cliente . "', 
// '" . $fecha_actual . "',  
// '" . $monto_total . "',  
// " . $id_usuario . ",  
// " . $id_empresa . ",  
// " . $id_sucursal . ", 
// '" . $estado . "');") or die(mysqli_error($con));
// $id_venta = mysqli_insert_id($con);

// if ($insert) {
//     foreach ($_SESSION['carrito'] as $key => $value) {
//         $detalle = mysqli_query($con, "INSERT INTO `ventas_detalle`
//         (`id_venta`,
//         `id_producto`,
//         `cantidad`,
//         `precio_unitario`,
//         `precio_total`)
//         VALUES
//         ('" . $id_venta . "',
//         '" . $value['id_producto'] . "',
//         '" . $value['cantidad'] . "',
//         '" . $value['precio_unitario'] . "',
//         '" . $value['precio_total'] . "');");

//         $update = mysqli_query($con, "UPDATE producto 
//             SET stock = stock-'" . $value['cantidad'] . "' 
//             WHERE id_pro='" . $value['id_producto'] . "'");
//     }
//     unset($_SESSION["carrito"]);
//     $update = mysqli_query($con, "UPDATE caja 
//         SET monto = monto+'$monto_total' 
//         WHERE estado='abierto'");
//     echo "<script>document.location='../ventas/agregar_venta.php?status=1'</script>";
// } else {
//     echo "<script>document.location='../ventas/agregar_venta.php?status=6'</script>";
// }
