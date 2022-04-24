<?php include '../layout/header.php';


?>

<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php include '../layout/main_sidebar.php'; ?>

      <!-- top navigation -->
      <?php include '../layout/top_nav.php'; ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x-panel">

            </div>

          </div>
          <!--end of modal-dialog-->
        </div>


        <!--end of modal-->

        <div class="box-body">
          <!-- Date range -->
          <section class="content-header">

          </section>

          <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>


          <div class="box-header">
            <h3 class="box-title"> Lista venta productos total</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th> Id </th>
                  <th> fecha </th>

                  <th> cliente </th>
                  <th class="btn-print"> ACCION </th>


                </tr>
              </thead>
              <tbody>





                <?php


                $fechaActual = date('Y-m-d');



                ?>

                <?php

                $query = mysqli_query($con, "select * from pedidos    ") or die(mysqli_error());
                $contador = 0;
                while ($row = mysqli_fetch_array($query)) {
                  $contador++;
                }

                ?>

                <div class="row">
                  <div class="col-md-4 col-lg-12 hide-section">
                    <a class="btn btn-danger btn-print" disabled="true" style="height:25%; width:50%; font-size: 25px " role="button">Nro ELEMENTOS= <label style='color:black;  font-size: 25px '>=<?php echo $contador; ?></label></a>



                  </div>


                </div>

                <?php







                $query = mysqli_query($con, "select * from pedidos AS p
   INNER JOIN clientes AS c
      ON c.id_cliente = p.id_cliente    ") or die(mysqli_error());
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                  $num_pedido = $row['id_pedido'];

                  $saldo = $row['monto_pagado'];

                ?>

                  <tr>
                    <td><?php echo $row['id_pedido']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td>
                      <?php


                      ?>
                      <a class="btn btn-danger btn-print" href="<?php echo "../Impresion/generar_pdf.php?num_pedido=$num_pedido"; ?>" role="button">Ver comprobante</a>


                      <?php
                      //          }
                      ?>

                    </td>
                    <?php

                    //if ($tipo_pago=="Credito") {
                    # code...

                    ?>


                  </tr>

                <?php
                }

                ?>


                <!--end of modal-->

              </tbody>


            </table>






            <footer>
              <div class="pull-right">
                <a href="">Cronos Academy</a>
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        </div>

        <?php include '../layout/datatable_script.php'; ?>


        <script>
          $(document).ready(function() {
            $('#example2').dataTable({
                "language": {
                  "paginate": {
                    "previous": "anterior",
                    "next": "posterior"
                  },
                  "search": "Buscar:",


                },
                "lengthMenu": [
                  [10, 25, 50, -1],
                  [10, 25, 50, "All"]
                ],


                "searching": true,
              }

            );
          });
        </script>
</body>

</html>