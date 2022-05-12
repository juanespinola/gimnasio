<?php

/**
 * TODO: los gastos que se realizan en el dia, solamente deben ser descontadas de la caja actual
 * TODO: se debe colocar un filtro para que realice la resta o suma solamente de la fecha de la caja abierta
 * TODO: no puede existir una caja con saldo negativo
 */

?>
<?php include '../layout/header.php'; ?>

<?php
$id_sucursal = $_SESSION['id_sucursal'];
$query = mysqli_query($con, "SELECT * FROM caja WHERE estado = 'abierto' AND id_sucursal = '$id_sucursal'") or die(mysqli_error($con));

if ($query->num_rows == 0) {
  echo "<script type='text/javascript'>alert('Debe contar con una caja activa!');</script>";
  echo "<script>document.location='../layout/inicio.php'</script>";
  exit;
}

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

        th,
        td {
          font-size: 15px;
          text-align: center;
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

        <?php
        $fechaactual = date('Y-m-d');
        $nuevafecha = strtotime('-1420 day', strtotime($fechaactual));
        $nuevafecha = date('Y-m-j', $nuevafecha);
        ?>

        <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="gastos_add.php" enctype="multipart/form-data" class="form-horizontal">
                    <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Fecha</label>
                        <div class="input-group col-sm-8">
                          <input type="date" class="form-control pull-right" id="date" name="fecha" required>
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
                    <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Descripcion</label>
                        <div class="input-group col-md-8">
                          <input type="text" class="form-control pull-right" id="date" name="descripcion" placeholder="Descripcion" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 btn-print">
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Monto Gastado</label>
                        <div class="input-group col-md-8">
                          <input type="text" class="form-control pull-right" id="date" name="cantidad" placeholder="monto" required>
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
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
          <h3 class="box-title"></h3>

        </div><!-- /.box-header -->

        <div class="box-header">
          <h3 class="box-title">Lista de Gastos</h3>
        </div><!-- /.box-header -->
        <button type="button" class="btn btn-primary btn-print" data-toggle="modal" data-target="#miModal">Nuevo</button>
        <div class="box-body">

          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width:30%">Fecha</th>
                <th style="width:30%">Descripcion</th>
                <th style="width:10%">Monto Gastado </th>
                <th style="width:30%" class="btn-print"> Accion </th>
              </tr>
            </thead>
            <tbody>
              <?php

              $query = mysqli_query($con, "SELECT * FROM gastos WHERE id_sucursal = '$id_sucursal' ORDER BY id_gastos DESC") or die(mysqli_error($con));

              while ($row = mysqli_fetch_array($query)) {
                $id_gasto = $row['id_gastos'];
                $cantidad = $row['cantidad'];
              ?>
                <tr>
                  <td><?php echo $row['fecha']; ?></td>
                  <td><?php echo $row['descripcion']; ?></td>
                  <td><?php echo $row['cantidad']; ?></td>
                  <td>
                    <a class="btn btn-success btn-print" href="#updateordinance<?php echo $row['id_gastos']; ?>" data-target="#updateordinance<?php echo $row['id_gastos']; ?>" data-toggle="modal" style="color:#fff;" style="height:25%; width:75%; font-size: 12px " role="button">Editar</a>
                    <a class="btn btn-danger btn-print" href="<?php echo "eliminar_gastos.php?id_gasto=$id_gasto&cantidad=$cantidad"; ?>" role="button">Eliminar</a>
                  </td>
                </tr>

                <div id="updateordinance<?php echo $row['id_gastos']; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content" style="height:auto">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Editar Gasto</h4>
                      </div>
                      <div class="modal-body">


                        <form class="form-horizontal" method="post" action="gastos_actualizar.php" enctype='multipart/form-data'>

                          <div class="row">
                            <div class="col-md-3 btn-print">
                              <div class="form-group">
                                <label for="date">Fecha</label>

                              </div><!-- /.form group -->
                            </div>
                            <div class="col-md-7 btn-print">
                              <div class="form-group">
                                <input type="hidden" class="form-control" id="cantidad_antigua" name="cantidad_antigua" value="<?php echo $row['cantidad']; ?>" required>
                                <input type="hidden" class="form-control" id="id" name="id_gastos" value="<?php echo $row['id_gastos']; ?>" required>
                                <input type="date" class="form-control" id="name" name="fecha" value="<?php echo $row['fecha']; ?>" required>

                              </div>
                            </div>
                            <div class="col-md-1 btn-print">

                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-3 btn-print">
                              <div class="form-group">
                                <label for="date">Descripcion</label>

                              </div><!-- /.form group -->
                            </div>
                            <div class="col-md-7 btn-print">
                              <div class="form-group">
                                <input type="text" class="form-control" id="price" name="descripcion" value="<?php echo $row['descripcion']; ?>" required>

                              </div>
                            </div>
                            <div class="col-md-1 btn-print">

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-3 btn-print">
                              <div class="form-group">
                                <label for="date">Monto Gastado</label>

                              </div><!-- /.form group -->
                            </div>
                            <div class="col-md-7 btn-print">
                              <div class="form-group">
                                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $row['cantidad']; ?>" required>

                              </div>
                            </div>
                            <div class="col-md-1 btn-print">

                            </div>

                            <div class="row">
                              <div class="col-md-3 btn-print">
                                <div class="form-group">


                                </div><!-- /.form group -->
                              </div>
                              <div class="col-md-7 btn-print">
                                <div class="form-group">

                                  <button type="submit" class="btn btn-primary btn-print">Guardar</button>
                                  <button type="button" class="btn btn-default btn-print" data-dismiss="modal">Cerrar</button>
                                </div>
                              </div>
                              <div class="col-md-1 btn-print">

                              </div>
                            </div>




                        </form>
                      </div>

                    </div>

                  </div>


                <?php } ?>
            </tbody>

          </table>
        </div>

      </div>


    </div>




  </div>




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
          "order": [0, 'desc'],
          "info": false,
          "lengthChange": false,
          "searching": false,


          "searching": true,
        }

      );
    });
  </script>

  <?php
  //}
  # code...

  ?>

  <!-- /gauge.js -->
</body>

</html>