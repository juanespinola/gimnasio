
<?php
session_start();
include('../../dist/includes/dbcon.php');
if (!isset($_GET["id_producto"])) {
    return;
}

$cantidad = $cantidad + 1;
$id_producto = $_GET["id_producto"];
$productos = mysqli_query($con, "SELECT * FROM producto WHERE id_producto = " . $id_producto) or die(mysqli_error($con));

// echo "<pre>";
// print_r($productos);
// echo "</pre>";
while ($producto = mysqli_fetch_array($productos)) {
    $stock = $producto['stock'];
    $precio_venta = $producto['precio_venta'];
    // echo "<pre>";
    // print_r($producto);
    // echo "</pre>";
}


# Si no hay existencia...
if ($stock == 0 && $estado != 'activo') {
    echo "<script>document.location='../ventas/agregar_venta.php?status=5'</script>";
    exit;
}

echo "<pre>";
print_r($_SESSION['carrito']);
echo "</pre>";
$existe_producto_en_carrito = false;
if (empty($_SESSION['carrito'])) {
    echo "array vacio";
    $item['id_producto'] = $id_producto;
    $item['cantidad'] = $cantidad;
    $item['precio_unitario'] = $precio_venta;
    $item['precio_total'] = $precio_venta * $cantidad;
    // echo "<pre>";
    // print_r($item);
    // echo "</pre>";
    array_push($_SESSION["carrito"], $item);
} else {
    for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
        if ($_SESSION["carrito"][$i]['id_producto'] == $id_producto) {
            $existe_producto_en_carrito = true;
            break;
        }
    }
    foreach ($_SESSION["carrito"] as $key => $value) {

        if ($value['id_producto'] == $id_producto) {
            $existe_producto_en_carrito = true;
            echo "<pre>";
            print_r($value);
            echo "</pre>";
            break;
        }
    }
    echo "array no vacio";
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    // $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    // if ($cantidadExistente + 1 > $producto->stock) {
    //     echo "<script>document.location='../ventas/pos.php?status=5'</script>";
    //     exit;
    // }
    // $_SESSION["carrito"][$indice]->cantidad++;
    // $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_venta;
}

// $sentencia = $base_de_datos->prepare("SELECT * FROM producto  WHERE id_producto = ? LIMIT 1;");
// $sentencia->execute([$id_producto]);
// $producto = $sentencia->fetch(PDO::FETCH_OBJ);

// # Si no existe, salimos y lo indicamos
// if (!$producto) {
//     echo "<script>document.location='../ventas/pos.php?status=4'</script>";
//     exit;
// }
// # Si no hay existencia...
// if ($producto->stock < 1) {
//     echo "<script>document.location='../ventas/pos.php?status=5'</script>";
//     exit;
// }
// session_start();
// # Buscar producto dentro del cartito
// $indice = false;
// for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
//     if ($_SESSION["carrito"][$i]->id_producto === $id_producto) {
//         $indice = $i;
//         break;
//     }
// }
// # Si no existe, lo agregamos como nuevo
// if ($indice === false) {
//     $producto->cantidad = $cantidad;
//     $producto->total = $producto->precio_venta * $cantidad;
//     $producto->nombre = $producto->nombre;
//     $producto->id_producto = $id_producto;
//     //        $producto->impu = $producto->precio_venta*$cantidad;
//     array_push($_SESSION["carrito"], $producto);
// } else {
//     # Si ya existe, se agrega la cantidad
//     # Pero espera, tal vez ya no haya
//     $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
//     # si al sumarle uno supera lo que existe, no se agrega
//     if ($cantidadExistente + 1 > $producto->stock) {
//         echo "<script>document.location='../ventas/pos.php?status=5'</script>";
//         exit;
//     }
//     $_SESSION["carrito"][$indice]->cantidad++;
//     $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_venta;
// }
// echo "<script>document.location='../ventas/pos.php'</script>";
