
<?php
include('../layout/dbcon.php');
if (!isset($_POST["id_producto"])) {
    return;
}

$cantidad = $_POST["cantidad"];
$id_producto = $_POST["id_producto"];
$sentencia = $base_de_datos->prepare("SELECT * FROM producto  WHERE id_producto = ? LIMIT 1;");
$sentencia->execute([$id_producto]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$producto) {
    echo "<script>document.location='../ventas/pos.php?status=4'</script>";
    exit;
}
# Si no hay existencia...
if ($producto->stock < 1) {
    echo "<script>document.location='../ventas/pos.php?status=5'</script>";
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->id_producto === $id_producto) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = $cantidad;
    $producto->total = $producto->precio_venta * $cantidad;
    $producto->nombre = $producto->nombre;
    $producto->id_producto = $id_producto;
    //        $producto->impu = $producto->precio_venta*$cantidad;
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->stock) {
        echo "<script>document.location='../ventas/pos.php?status=5'</script>";
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio_venta;
}
echo "<script>document.location='../ventas/pos.php'</script>";
