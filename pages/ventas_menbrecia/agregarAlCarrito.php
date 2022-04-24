
<?php
include('../layout/dbcon.php');
if (!isset($_GET["id_plan"])) {
    return;
}




  $id_plan = $_GET['id_plan'];





$sentencia = $base_de_datos->prepare("SELECT * FROM planes  WHERE id_plan = ? LIMIT 1;");
$sentencia->execute([$id_plan]);
$planes = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$planes) {

      echo "<script>document.location='../ventas_menbrecia/pos.php?status=4'</script>";
//    header("Location: ../pos.php?status=4");
    exit;
}
# Si no hay existencia...

session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito_planes"]); $i++) {
    if ($_SESSION["carrito_planes"][$i]->id_plan === $id_plan) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $planes->cantidad =1;
    $planes->total = $planes->precio;
       $planes->nombre_plan = $planes->nombre_plan;
              $planes->tipo_tiempo = $planes->tipo_tiempo;
                 $planes->numero_tiempo = $planes->numero_tiempo;
                     $planes->precio = $planes->precio;
              $planes->id_plan = $id_plan;
//        $producto->impu = $producto->precio_venta*$cantidad;
    array_push($_SESSION["carrito_planes"], $planes);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya

    $_SESSION["carrito_planes"][$indice]->cantidad++;
        $_SESSION["carrito_planes"][$indice]->total = $_SESSION["carrito_planes"][$indice]->precio;


}
  echo "<script>document.location='../ventas_menbrecia/pos.php'</script>";
//header("Location: ../pos.php");
