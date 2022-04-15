<?php
session_start();
include('../../dist/includes/dbcon.php');
//$branch=$_SESSION['branch'];

$descripcion = $_POST['descripcion'];

$query2 = mysqli_query($con, "select * from deportes where descripcion LIKE '%$descripcion%'") or die(mysqli_error($con));
$count = mysqli_num_rows($query2);

if ($count > 0) {
    echo "<script type='text/javascript'>alert('Registro ya existente!');</script>";
    echo "<script>document.location='deportes.php'</script>";
} else {
    mysqli_query($con, "INSERT INTO deportes(descripcion) VALUES('$descripcion')") or die(mysqli_error($con));
    echo "<script>document.location='deportes.php'</script>";
}
