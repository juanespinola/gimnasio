<?php


if (!isset($_GET["indice"])) {
    return;
}
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carrito"], $indice, 1);

echo "<script>document.location='./agregar_venta.php?status=3'</script>";
