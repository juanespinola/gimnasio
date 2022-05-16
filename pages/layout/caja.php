<?php include '../layout/header.php';

//$branch_id = $_GET['id'];
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
        <div class="box-body">
          <!-- Date range -->

        </div>

        <div class="box-header">
          <h3 class="box-title"> </h3>
        </div><!-- /.box-header -->
        <div class="box-body">

          <div class="box-header with-border">
            <h3 class="box-title">Caja</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <?php

              $id_empresa = $_SESSION['id_empresa'];
              $id_sucursal = $_SESSION['id_sucursal'];

              $caja_query = mysqli_query($con, "SELECT * FROM caja WHERE estado='abierto' AND id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
              // $i = 0;
              // while ($row_caja = mysqli_fetch_array($caja_query)) {
              //   // $caja_cont++;
              //   $acumulado = $row_caja['monto'];

              // }
              if ($caja_query->num_rows == 0) {

              ?>
                <button type="button" class="btn btn-danger btn-print" data-toggle="modal" data-target="#miModalcaja">
                  Abrir Caja
                </button>
              <?php
              }
              if ($caja_query->num_rows > 0) {
              ?>
                <button type="button" class="btn btn-danger btn-print" data-toggle="modal" data-target="#miModalcajacerrar">
                  Cerrar Caja
                </button>
                <div class="row">
                  <div class="col-md-4 hide-section">
                    <a class="btn btn-danger btn-print" disabled="true" role="button">MONTO CAJA= <label style='color:black;'>= <?php echo "$simbolo_moneda $acumulado $moneda"; ?></label></a>
                  </div>
                </div>
              <?php
              }

              ?>
              <div class="modal fade" id="miModalcajacerrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="box-body">
                        <!-- Date range -->
                        <form method="post" action="caja_close.php" enctype="multipart/form-data" class="form-horizontal">
                          <div class="col-md-6 btn-print">
                            <div class="form-group">
                              <div class="row">
                                <div class="input-group col-4">
                                  <label for="date">MONTO ACTUAL</label>
                                </div>
                                <div class="input-group col-4">
                                  <input type="text" class="form-control pull-right" id="monto" name="monto" value="<?php echo "$acumulado"; ?>" readonly="readonly">
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <!-- <div class="col-md-12"> -->
                      <div class="col-md-12">
                        <button class="btn btn-primary btn-print" id="daterange-btn" name="guardar">Cerrar caja</button>
                        <button class="btn btn-secundary btn-print" data-dismiss="modal">Cancelar</button>
                      </div>
                      <!-- </div> -->
                      </form>
                    </div>
                  </div>
                </div>
              </div>


              <div class="modal fade" id="miModalcaja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="box-body">
                        <!-- Date range -->
                        <form method="post" action="caja_add.php" enctype="multipart/form-data" class="form-horizontal">
                          <div class="col-md-6 btn-print">
                            <div class="form-group">
                              <label for="date">Monto Inicial</label>
                              <div class="input-group col-md-8">
                                <input type="text" class="form-control pull-right" id="monto" name="monto" placeholder="Monto Inicial">
                              </div>
                            </div>
                          </div>
                      </div>

                      <br><br>
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <button class="btn btn-primary btn-print" id="daterange-btn" name="guardar">Guardar</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal" name="actualizar">Cerrar</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="box-header">
              <h3 class="box-title"> Lista de Cajas</h3>
            </div>
            <div class="box-body">

              <table ID="example22" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Fecha apertura</th>
                    <th>Fecha cierre</th>
                    <th>Estado</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT * FROM caja WHERE id_sucursal = '$id_sucursal' ORDER BY id_caja ASC;") or die(mysqli_error($con));
                  $i = 0;
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $row['id_caja']; ?></td>
                      <td><?php echo $row['fecha_apertura']; ?></td>
                      <td><?php echo (isset($row['fecha_cierre'])) ? $row['fecha_cierre'] : ' ---- - -- - -- '; ?></td>
                      <td><?php echo $row['estado']; ?></td>
                      <td><?php echo $row['monto']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>

              </table>
              <script type="text/javascript">
                // < ![CDATA[
                function Eliminar(i) {
                  document.getElementsByTagName("table")[0].setAttribute("id", "tableid");
                  document.getElementById("tableid").deleteRow(i);
                }

                function Buscar() {
                  var tabla = document.getElementById('example22');
                  var busqueda = document.getElementById('txtBusqueda').value.toLowerCase();
                  var cellsOfRow = "";
                  var found = false;
                  var compareWith = "";
                  for (var i = 1; i < tabla.rows.length; i++) {
                    cellsOfRow = tabla.rows[i].getElementsByTagName('td');
                    found = false;
                    for (var j = 0; j < cellsOfRow.length && !found; j++) {
                      compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                      if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1)) {
                        found = true;
                      }
                    }
                    if (found) {
                      tabla.rows[i].style.display = '';
                    } else {
                      tabla.rows[i].style.display = 'none';
                    }
                  }
                }
                // ]]>
              </script>
            </div><!-- /.box-body -->
          </div>
          <!--row-->




        </div><!-- /.col (right) -->
      </div><!-- /.box-body -->

    </div><!-- /.col -->


  </div><!-- /.row -->



  <footer>
    <div class="pull-right">
      <a href="">Cronos Academy</a>
    </div>
    <div class="clearfix"></div>
  </footer>




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


  <!-- /gauge.js -->
</body>

</html>