
<?php
session_start();
include('../../dist/includes/dbcon.php');
if (!isset($_GET["id_producto"])) {
    return;
}

$cantidad = 1;
$id_producto = $_GET["id_producto"];
$productos = mysqli_query($con, "SELECT * FROM producto WHERE id_producto = " . $id_producto) or die(mysqli_error($con));

while ($producto = mysqli_fetch_array($productos)) {
    $stock = $producto['stock'];
    $precio_venta = $producto['precio_venta'];
    $nombre_producto = $producto['nombre'];
}


# Si no hay existencia...
if ($stock == 0 && $estado != 'activo') {
    echo "<script>document.location='../ventas/agregar_venta.php?status=5'</script>";
    exit;
}
if (empty($_SESSION['carrito'])) {
} else {
    foreach ($_SESSION["carrito"] as $key => $value) {
        if ($_SESSION['carrito'][$key]['id_producto'] == $id_producto) {
            $indice = $key;
            break;
        }
    }

    if (isset($indice)) {
        if ($_SESSION['carrito'][$key]['cantidad'] <= 1) {
            array_splice($_SESSION["carrito"], $indice, 1);
            echo "<script>document.location='../ventas/agregar_venta.php?status=3'</script>";
        } else {
            $_SESSION['carrito'][$key]['cantidad']--;
            $_SESSION['carrito'][$key]['precio_total'] = $_SESSION['carrito'][$key]['precio_unitario'] * $_SESSION['carrito'][$key]['cantidad'];
        }
    } else {
        echo "<script>document.location='../ventas/agregar_venta.php?status=3'</script>";
    }
}
echo "<script>document.location='../ventas/agregar_venta.php'</script>";
