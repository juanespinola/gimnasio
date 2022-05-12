


<?php session_start();
if (empty($_SESSION['id'])) :
endif;
include('../../dist/includes/dbcon.php');


$query = mysqli_query($con, "SELECT * FROM caja WHERE estado = 'abierto'") or die(mysqli_error($con));

if ($query->num_rows == 0) {
    echo "<script type='text/javascript'>alert('Debe contar con una caja activa!');</script>";
    echo "<script>document.location='../layout/inicio.php'</script>";
    exit;
}



$id_gastos = $_POST['id_gastos'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];

$cantidad = $_POST['cantidad'];
$cantidad_antigua = $_POST['cantidad_antigua'];

$update = mysqli_query($con, "UPDATE caja SET monto=monto+'$cantidad_antigua' WHERE estado='abierto' ");

$update = mysqli_query($con, "UPDATE caja SET monto=monto-'$cantidad' WHERE estado='abierto' ");

mysqli_query($con, "UPDATE gastos SET fecha='$fecha',descripcion='$descripcion',cantidad='$cantidad' WHERE id_gastos='$id_gastos'") or die(mysqli_error($con));

echo "<script type='text/javascript'>alert('gastos actualizado correctamente!');</script>";
echo "<script>document.location='gastos.php'</script>";



?>
