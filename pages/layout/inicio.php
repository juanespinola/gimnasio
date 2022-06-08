<?php
session_start();
include '../layout/header.php';
if (empty($_SESSION['id'])) {
  header('Location: ../../index.php');
  exit;
}
$id_sucursal = $_SESSION['id_sucursal'];

unset($_SESSION["carrito"]);
unset($_SESSION["carrito_evento"]);
?>

<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">

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

        </div>

        <div class="box-body">

        </div>

        <div class="box-header">
          <h3 class="box-title">Bienvenido!</h3>
        </div>
        <div class="box-body">

          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
            <div class="row">

              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h4>
                      <?php
                      $num = 0;
                      $select = mysqli_query($con, "SELECT * FROM caja WHERE id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
                      $num = mysqli_num_rows($select);
                      echo $num;
                      ?>
                    </h4>
                    <p>Caja</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/cajero.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../layout/caja.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-red">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $query = mysqli_query($con, "SELECT * FROM producto WHERE id_sucursal = '$id_sucursal' ") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Productos</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/mancuerna_1.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../producto/producto.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>





              <?php
              if ($tipo == "administrador") {

              ?>

                <div class="col-lg-3 col-xs-6">

                  <div class="small-box bg-black">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM usuario WHERE estado = 'activo'") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Usuarios en total</p>
                    </div>
                    <div class="icon"><img height="80" width="80" src="img/usuarios.png">
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../usuario/usuario.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


              <?php
              }
              ?>


              <?php if ($tipo == "administrador") { ?>


                <div class="col-lg-3 col-xs-6">

                  <div class="small-box bg-orange">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM sucursales WHERE estado = 'activo'") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>Sucursales</p>
                    </div>
                    <div class="icon"><img height="80" width="80" src="img/sucursales.png">
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../sucursales/sucursales.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


              <?php
              }
              ?>



              <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $query = mysqli_query($con, "SELECT * FROM planes WHERE id_sucursal = '$id_sucursal' ") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Alumnos para hoy</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/planes.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../planes/planes.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>





              <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-purple">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $select = mysqli_query($con, "SELECT * FROM clientes WHERE estado = 'activo'  AND id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
                      $num = mysqli_num_rows($select);
                      echo $num;
                      ?>
                    </h4>
                    <p>Clientes</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/clientes.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>



              <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-aqua">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $select = mysqli_query($con, "SELECT * FROM gastos WHERE id_sucursal = '$id_sucursal' AND fecha = date_format(NOW(), '%Y-%m-%d');") or die(mysqli_error($con));
                      $num = mysqli_num_rows($select);
                      echo $num;
                      ?>
                    </h4>
                    <p>Gastos de hoy</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/gastos.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../gastos/gastos.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>


              <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-aqua">
                  <div class="inner">

                    <h4>
                      <?php

                      $num = 1;
                      $query = mysqli_query($con, "SELECT * FROM ventas WHERE id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Ventas productos</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/ventas_productos.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../ventas/ventas.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>

              <!-- <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                  <div class="inner">

                    <h4>
                      <?php

                      $num = 1;

                      echo $num;
                      ?>
                    </h4>
                    <p>Mensajes</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/mensaje.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../mensaje/mensaje.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div> -->

            </div>


          </div>








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

</body>

</html>