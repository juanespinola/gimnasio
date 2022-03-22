<?php
session_start();
include('../../dist/includes/dbcon.php');


$id_plan = $_GET['id_plan'];
// print_r($id_plan);
mysqli_query($con, "DELETE FROM planes WHERE id_plan = '$id_plan'") or die(mysqli_error($con));

echo "<script>document.location='planes.php'</script>";
