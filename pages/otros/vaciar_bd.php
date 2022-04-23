<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../../dist/includes/dbcon.php');






    mysqli_query($con,"delete from caja	 ")or die(mysqli_error());
    mysqli_query($con,"delete from clientes 	  ")or die(mysqli_error());
       mysqli_query($con,"delete from detalles_pedido 	  ")or die(mysqli_error());
       mysqli_query($con,"delete from gastos  	   ")or die(mysqli_error());
              mysqli_query($con,"delete from history_log 	   ")or die(mysqli_error());
  
                  mysqli_query($con,"delete from pagar_credito 	 	  ")or die(mysqli_error());        
    mysqli_query($con,"delete from pedidos ")or die(mysqli_error());  
    mysqli_query($con,"delete from planes   ")or die(mysqli_error());  
    mysqli_query($con,"delete from plan_asistencia 	 ")or die(mysqli_error()); 
       mysqli_query($con,"delete from plan_cliente  ")or die(mysqli_error()); 
            mysqli_query($con,"delete from producto  	 ")or die(mysqli_error()); 

            mysqli_query($con,"delete from sueldo_pago  ")or die(mysqli_error()); 

      mysqli_query($con,"delete from sueldo_empleado  ")or die(mysqli_error()); 


 
                mysqli_query($con,"delete from venta_diaria  ")or die(mysqli_error()); 
 
  echo "<script>document.location='../layout/inicio.php'</script>";  
  
  
?>