<?php


if (!isset($_GET["indice"])) {
    return;
}
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carrito_evento"], $indice, 1);

echo "<script>document.location='./agregar_evento_ingreso.php?id_evento=$id_evento&status=3'</script>";
