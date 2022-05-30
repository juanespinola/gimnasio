
<?php
session_start();
include('../../dist/includes/dbcon.php');
if (!isset($_GET["id_evento_producto"])) {
    return;
}

$cantidad = 1;
$id_evento_producto = $_GET["id_evento_producto"];
$id_evento = $_GET['id_evento'];
$productos = mysqli_query($con, "SELECT * FROM evento_productos WHERE id_evento_producto = " . $id_evento_producto) or die(mysqli_error($con));

while ($producto = mysqli_fetch_array($productos)) {
    $stock = $producto['stock'];
    $precio_venta = $producto['precio_venta'];
    $nombre_producto = $producto['nombre'];
}


# Si no hay existencia...
if ($stock == 0 && $estado != 'activo') {
    echo "<script>document.location='../evento_ingresos/agregar_evento_ingreso.php?id_evento=$id_evento&status=5'</script>";
    exit;
}

if (empty($_SESSION['carrito_evento'])) {
    $item['id_evento_producto'] = $id_evento_producto;
    $item['cantidad'] = $cantidad;
    $item['precio_unitario'] = $precio_venta;
    $item['precio_total'] = $precio_venta * $cantidad;
    $item['nombre_producto'] = $nombre_producto;
    array_push($_SESSION["carrito_evento"], $item);
} else {
    foreach ($_SESSION["carrito_evento"] as $key => $value) {
        if ($_SESSION['carrito_evento'][$key]['id_evento_producto'] == $id_evento_producto) {
            $indice = $key;
            break;
        }
    }

    if (isset($indice)) {
        $_SESSION['carrito_evento'][$key]['cantidad']++;
        $_SESSION['carrito_evento'][$key]['precio_total'] = $_SESSION['carrito_evento'][$key]['precio_unitario'] * $_SESSION['carrito_evento'][$key]['cantidad'];
        if ($_SESSION['carrito_evento'][$key]['cantidad'] > $stock) {
            echo "<script>document.location='../evento_ingresos/agregar_evento_ingreso.php?id_evento=$id_evento&status=5'</script>";
            exit;
        }
    } else {
        $item['id_evento_producto'] = $id_evento_producto;
        $item['cantidad'] = $cantidad;
        $item['precio_unitario'] = $precio_venta;
        $item['precio_total'] = $precio_venta * $cantidad;
        $item['nombre_producto'] = $nombre_producto;

        array_push($_SESSION["carrito_evento"], $item);
    }
}
echo "<script>document.location='../evento_ingresos/agregar_evento_ingreso.php?id_evento=$id_evento'</script>";
