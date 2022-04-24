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

          <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Imprimir</a>
          <div class="box-header">
            <h3 class="box-title">Lista de Clientes con Membresia</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre cliente</th>
                  <th>Cedula</th>
                  <th>En meses/dias </th>
                  <th>Numero de meses/dias </th>
                  <th>Fecha inicio </th>
                  <th class="btn-print"> ACCION </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $fechaActual = date('Y-m-d');
                ?>
                <?php
                $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c  ON c.id_cliente = z.id_cliente  ") or die(mysqli_error($con));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                  $codigo = $row['codigo'];
                  $id_plan_cliente = $row['id_plan_cliente'];
                ?>
                  <tr>
                    <td><?php echo $row['codigo']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['dni']; ?></td>
                    <td><?php echo $row['tipo_tiempo']; ?></td>

                    <td><?php echo $row['numero_tiempo']; ?></td>
                    <td><?php echo $row['fecha_inicio']; ?></td>

                    <td>
                      <a class="btn btn-danger btn-print" href="<?php echo "asistencia_plan_agregar.php?id_plan_cliente=$id_plan_cliente"; ?>" role="button">Ver asistencia</a>
                    </td>
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