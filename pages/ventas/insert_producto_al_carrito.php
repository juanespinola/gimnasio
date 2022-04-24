
<?php
session_start();
include('../../dist/includes/dbcon.php');
if (!isset($_GET["id_producto"])) {
    return;
}

$cantidad = 1;
$id_producto = $_GET["id_producto"];
$productos = mysqli_query($con, "SELECT * FROM producto WHERE id_producto = " . $id_producto) or die(mysqli_error($con));

// echo "<pre>";
// print_r($productos);
// echo "</pre>";
while ($producto = mysqli_fetch_array($productos)) {
    $stock = $producto['stock'];
    $precio_venta = $producto['precio_venta'];
    $nombre_producto = $producto['nombre'];
    // echo "<pre>";
    // print_r($producto);
    // echo "</pre>";
}


# Si no hay existencia...
if ($stock == 0 && $estado != 'activo') {
    echo "<script>document.location='../ventas/agregar_venta.php?status=5'</script>";
    exit;
}

// echo "<pre>";
// print_r($_SESSION['carrito']);
// echo "</pre>";
// $existe_producto_en_carrito = false;
if (empty($_SESSION['carrito'])) {
    $item['id_producto'] = $id_producto;
    $item['cantidad'] = $cantidad;
    $item['precio_unitario'] = $precio_venta;
    $item['precio_total'] = $precio_venta * $cantidad;
    $item['nombre_producto'] = $nombre_producto;
    // echo "<pre>";
    // print_r($item);
    // echo "</pre>";
    array_push($_SESSION["carrito"], $item);
} else {
    // TODO: encontrar la manera de agregar al carrito porque agrega doble actualmente
    foreach ($_SESSION["carrito"] as $key => $value) {
        echo 'id_producto = ' . $id_producto . "<br>";
        echo "value['id_producto'] = " . $value['id_producto'] . "<br>";
        echo "key = " . $key . "<br>";
        if ($_SESSION['carrito'][$key]['id_producto'] == $id_producto) {
            // $existe_producto_en_carrito = true;

            // echo 'existe el producto';
            $_SESSION['carrito'][$key]['cantidad']++;
            $_SESSION['carrito'][$key]['precio_total'] = $_SESSION['carrito'][$key]['precio_unitario'] * $_SESSION['carrito'][$key]['cantidad'];
            // echo "<pre>";
            // print_r($_SESSION['carrito'][$key]);
            // echo "</pre>";
            if ($_SESSION['carrito'][$key]['cantidad'] > $stock) {
                echo "<script>document.location='../ventas/agregar_venta.php?status=5'</script>";
                exit;
            }
            // $_SESSION['carrito'] = $value['precio_unitario'] * $value['cantidad'];
            break;
        } else {
            // $item['id_producto'] = $id_producto;
            // $item['cantidad'] = $cantidad;
            // $item['precio_unitario'] = $precio_venta;
            // $item['precio_total'] = $precio_venta * $cantidad;
            // $item['nombre_producto'] = $nombre_producto;

            // array_push($_SESSION["carrito"], $item);
        }
    }
    // echo "<pre>";
    // print_r($_SESSION['carrito']);
    // echo "</pre>";
}
// echo "<script>document.location='../ventas/agregar_venta.php'</script>";
