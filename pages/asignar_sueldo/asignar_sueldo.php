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
  <?php
  if ($tipo == "administrador" or $tipo == "empleado") {
  ?>

    <div class="container body">
      <div class="main_container">
        <?php include '../layout/main_sidebar.php'; ?>

        <!-- top navigation -->
        <?php include '../layout/top_nav.php'; ?>
        <!-- /top navigation -->
        <style>
          label {

            color: black;
          }

          li {
            color: white;
          }

          ul {
            color: white;
          }

          #buscar {
            text-align: right;
          }
        </style>

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
          <div class="box-header">
            <h3 class="box-title"></h3>

          </div><!-- /.box-header -->


          <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 15px;">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="box-body">
                    <!-- Date range -->
                    <form method="post" action="asignar_sueldo_add.php" enctype="multipart/form-data" class="form-horizontal">


                      <div class="col-md-12 btn-print">
                        <div class="form-group">
                          <label for="date" class="col-sm-3 control-label">Sueldo</label>
                          <div class="input-group col-md-8">
                            <input type="text" class="form-control pull-right" id="sueldo" name="sueldo" placeholder="sueldo" required>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->
                      </div>


                      <div class="col-md-12 btn-print">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="idusuario">Empleado</label>
                          <div class="input-group col-md-8">
                            <select class="form-control select2" name="id_usuario" required>
                              <option value="">Seleccione Opcion</option>
                              <?php
                              $queryc = mysqli_query($con, "select * from usuario where estado='activo' and tipo='empleado'") or die(mysqli_error($con));
                              while ($rowc = mysqli_fetch_array($queryc)) {
                              ?>
                                <option value="<?php echo $rowc['id']; ?>"><?php echo $rowc['nombre']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <button class="btn btn-primary btn-print" id="daterange-btn" name="">Guardar</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>

                      </div>

                    </form>

                  </div>
                </div>

              </div>
            </div>
          </div>
          <!--end of modal-->


          <div class="box-header">
            <h3 class="box-title">Lista de Empleados</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <button type="button" class="btn btn-primary btn-print" data-toggle="modal" data-target="#miModal">Agregar Salario</button>
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width:10%">Nombre completo</th>
                  <th style="width:10%"> Correo </th>
                  <th style="width:10%"> Salario Actual </th>
                  <th style="width:10%"> Pagar sueldo </th>
                  <th style="width:10%" class="btn-print"> Pagos hechos </th>
                  <th style="width:10%" class="btn-print"> Editar </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($con, "select * from  usuario AS u INNER JOIN sueldo_empleado AS s  ON s.id_usuario = u.id") or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($query)) {
                  $id_usuario = $row['id_usuario'];
                ?>
                  <tr>
                    <td><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['sueldo']; ?></td>
                    <td><a class="btn btn-primary btn-print" href="<?php echo "pagar_sueldo.php?id_usuario=$id_usuario"; ?>" role="button">Pagar Sueldo</a></td>
                    <td><a class="btn btn-warning btn-print" href="<?php echo "pagos_hechos.php?id_usuario=$id_usuario"; ?>" role="button">Pagos hechos</a></td>
                    <!-- <td><a class="btn btn-danger btn-print" href="#updateordinance<?php echo $row['id_usuario']; ?>" data-target="#updateordinance<?php echo $row['id_usuario']; ?>" data-toggle="modal" style="color:#fff;" style="height:25%; width:75%; font-size: 12px " role="button">Editar</a></td> -->
                    <td><a class="btn btn-danger btn-print" title="Editar Sueldo" href="<?php echo "asignar_sueldo_editar.php?id_usuario=$id_usuario"; ?>">Editar Sueldo</a></td>
                  </tr>
                  <!-- <div id="updateordinance<?php echo $row['id_usuario']; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content" style="height:auto">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">ACCION ACTUALIZAR SUELDO</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" method="post" action="asignar_sueldo_actualizar.php" enctype='multipart/form-data'>

                            <div class="row">

                              <div class="col-md-3 btn-print">
                                <div class="form-group">
                                  <label for="date">sueldo</label>
                                </div>
                              </div>

                              <div class="col-md-7 btn-print">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $row['id_usuario']; ?>" required>
                                  <input type="text" class="form-control" id="sueldo" name="sueldo" value="<?php echo $row['sueldo']; ?>" required>
                                </div>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-md-7 btn-print">
                                <div class="form-group">

                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                              </div>

                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div> -->
                <?php } ?>
              </tbody>

            </table>
          </div><!-- /.box-body -->

        </div><!-- /.col -->


      </div><!-- /.row -->




    </div><!-- /.box-body -->

    </div>
    </div>
    </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
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

            "info": false,
            "lengthChange": false,
            "searching": false,


            "searching": true,
          }

        );
      });
    </script>

  <?php
  }
  ?>

  <!-- /gauge.js -->
</body>

</html>