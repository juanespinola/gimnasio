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

        <div class="container">
              <div class="col-md-3">
             
                </div>
              <div class="col-md-3">
                <form method="post" action="reportes_por_mes_planes.php" enctype="multipart/form-data" class="form-horizontal">
              <button class="btn btn-lg btn-danger btn-print" id="daterange-btn" name="buscar_fechas">BUSCAR POR MES</button>
              <div class="col-md-12 btn-print">
                <div class="form-group">
                  <label for="date" class="col-sm-3 control-label">SELCCIONE MES </label>
                  <div class="input-group col-sm-8">

                    <select name="mes" class="form-control select2" autofocus required>
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marso</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Setiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>

                    </select>

                  </div><!-- /.input group -->
                </div><!-- /.form group -->
              </div>








              <div class="col-md-12">
                <div class="col-md-12">


                </div>

              </div>

            </form>
                </div>
              <div class="col-md-3">
               
                </div>
              </div>
        <!--end of modal-->

        <div class="box-body">
          <!-- Date range -->
          <section class="content-header">

          </section>

          <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>


          <div class="box-header">
            <h3 class="box-title"> Lista datos</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre cliente</th>
                  <th>Dni</th>
                  <th>En meses/dias </th>


                  <th>Numero de meses/dias </th>
                  <th>Fecha inicio </th>
                  <th>Fecha fin</th>
                  <th class="btn-print"> ACCION </th>

                </tr>
              </thead>
              <tbody>





                <?php





                if (isset($_POST['buscar_fechas'])) {
                  $mes = $_POST['mes'];

                ?>

                  <?php

                  $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z
      ON p.id_plan = z.id_plan INNER JOIN clientes AS c
      ON c.id_cliente = z.id_cliente  where  MONTH(fecha_inicio)='$mes'  ") or die(mysqli_error());
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






                  $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z
      ON p.id_plan = z.id_plan INNER JOIN clientes AS c
      ON c.id_cliente = z.id_cliente  where  MONTH(fecha_inicio)='$mes' ") or die(mysqli_error());
                  $i = 1;
                  while ($row = mysqli_fetch_array($query)) {
                    $codigo = $row['codigo'];

                  ?>

                    <tr>
                      <td><?php echo $row['nombre']; ?></td>
                      <td><?php echo $row['dni']; ?></td>
                      <td><?php echo $row['tipo_tiempo']; ?></td>

                      <td><?php echo $row['numero_tiempo']; ?></td>
                      <td><?php echo $row['fecha_inicio']; ?></td>
                      <td><?php echo $row['fecha_fin']; ?></td>
                      <td>
                        <?php


                        ?>
                        <a class="btn btn-danger btn-print" href="<?php echo "../Impresion/generar_carnet_plan.php?codigo=$codigo"; ?>" role="button">Ver comprobante</a>


                        <?php
                        //          }
                        ?>

                      </td>
                    </tr>

                <?php
                  }
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