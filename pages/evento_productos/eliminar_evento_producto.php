<?php session_start();
if (empty($_SESSION['id'])) :
    header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');


if (isset($_REQUEST['id_evento_producto'])) {
    $id_producto = $_REQUEST['id_evento_producto'];
    $id_evento = $_REQUEST['id_evento'];
} else {
    $id_producto = $_POST['id_evento_producto'];
    $id_evento = $_POST['id_evento'];
}

$update = mysqli_query($con, "UPDATE evento_productos SET estado='sin stock', stock='0' WHERE id_evento_producto='$id_producto'") or die(mysqli_error($con));
if ($update) {
    echo "<script>document.location='../evento_productos/evento_productos.php?id_evento=$id_evento'</script>";
} else {
    echo "<script type='text/javascript'>alert('Producto No actualizado Correctamente!');</script>";
}
