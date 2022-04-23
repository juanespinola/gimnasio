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
        <?php
        if (isset($_REQUEST['id_cliente'])) {
          $id_cliente = $_REQUEST['id_cliente'];
        } else {
          $id_cliente = $_POST['id_cliente'];
        }

        ?>

        <div class="box-header">
          <h3 class="box-title"> Editar Alumno</h3>
        </div><!-- /.box-header -->

        <a class="btn btn-warning btn-print" href="cliente.php" role="button">Regresar</a>
        <?php
        // $branch=$_SESSION['branch'];
        $query = mysqli_query($con, "select * from clientes where id_cliente= '$id_cliente' ") or die(mysqli_error($con));
        $i = 1;
        while ($row = mysqli_fetch_array($query)) {
          $id_cliente = $row['id_cliente'];

        ?>

          <form class="form-horizontal" method="post" action="cliente_actualizar.php" enctype='multipart/form-data'>
            <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $row['id_cliente']; ?>" required>
            <div class="row">
              <div class="col-md-3 btn-print">
                <div class="form-group">
                  <label for="date">Nombres </label>

                </div><!-- /.form group -->
              </div>
              <div class="col-md-4 btn-print">
                <div class="form-group">

                  <input type="text" class="form-control" id="name" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                </div>
              </div>
              <div class="col-md-4 btn-print">

              </div>
            </div>

            <div class="row">
              <div class="col-md-3 btn-print">
                <div class="form-group">
                  <label for="date">Apellidos </label>

                </div><!-- /.form group -->
              </div>
              <div class="col-md-4 btn-print">
                <div class="form-group">

                  <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>" required>
                </div>
              </div>
              <div class="col-md-4 btn-print">

              </div>
            </div>

            <div class="row">
              <div class="col-md-3 btn-print">
                <div class="form-group">
                  <label for="date">Ruc</label>

                </div><!-- /.form group -->
              </div>
              <div class="col-md-4 btn-print">
                <div class="form-group">

                  <input type="text" class="form-control" id="ruc" name="ruc" value="<?php echo $row['ruc']; ?>">
                </div>
              </div>
              <div class="col-md-4 btn-print">

              </div>
            </div>

            <div class="row">
              <div class="col-md-3 btn-print">
                <div class="form-group">
                  <label for="date">Cedula</label>

                </div><!-- /.form group -->
              </div>
              <div class="col-md-4 btn-print">
                <div class="form-group">

                  <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $row['dni']; ?>">
                </div>
              </div>
              <div class="col-md-4 btn-print">

              </div>
            </div>


            <div class="row">
              <div class="col-md-3 btn-print">
                <div class="form-group">
                  <label for="date">Telefono</label>

                </div><!-- /.form group -->
              </div>
              <div class="col-md-4 btn-print">
                <div class="form-group">

                  <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>">
                </div>
              </div>
              <div class="col-md-4 btn-print">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 btn-print">
                <div class="form-group">
                  <label for="fecha_nacimiento">Fecha Nacimiento</label>

                </div>
              </div>
              <div class="col-md-4 btn-print">
                <div class="form-group">
                  <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
                </div>
              </div>
              <div class="col-md-4 btn-print">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 btn-print">
                <div class="form-group">
                  <label for="estado">Estado</label>

                </div>
              </div>
              <div class="col-md-4 btn-print">
                <div class="form-group">
                  <select class="form-control select2" name="estado" id="estado" required>
                    <option value="activo" <?php if ($row['estado'] == "activo") {
                                              echo "selected";
                                            } ?>>Activo</option>
                    <option value="inactivo" <?php if ($row['estado'] == "inactivo") {
                                                echo "selected";
                                              } ?>>Inactivo</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 btn-print">
              </div>
            </div>


            <button type="submit" class="btn btn-primary">Guardar</button>


            <br><br><br>
            <hr>
            <div class="modal-footer">


            </div>
          </form>

          <!--end of modal-->

        <?php } ?>

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
  // }    
  ?>



  <!-- /gauge.js -->
</body>

</html>