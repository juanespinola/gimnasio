<?php
session_start();
include '../layout/header.php';
if (empty($_SESSION['id'])) {
  header('Location: ../../index.php');
  exit;
}
unset($_SESSION["carrito"]);
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
          <h3 class="box-title">Bienvenido!</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $select = mysqli_query($con, "SELECT * FROM caja ") or die(mysqli_error($con));
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
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $query = mysqli_query($con, "select * from producto ") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Productos</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/productos.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../producto/producto.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>





              <?php
              if ($tipo == "administrador") {

              ?>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-black">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 0;
                        $select = mysqli_query($con, "SELECT * FROM usuario ") or die(mysqli_error($con));
                        $num = mysqli_num_rows($select);
                        echo $num;
                        ?>
                      </h4>
                      <p>usuarios</p>
                    </div>
                    <div class="icon"><img height="80" width="80" src="img/comittee.png">
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../usuario/usuario.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


              <?php
              }
              ?>


              <?php
              if ($tipo == "administrador") {

              ?>


                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-orange">
                    <div class="inner">

                      <h4>
                        <?php
                        $num = 1;
                        echo $num;
                        ?>
                      </h4>
                      <p>Configuracion empresa</p>
                    </div>
                    <div class="icon"><img height="80" width="80" src="img/setting.png">
                      <i class=""></i>
                    </div>
                    <?php echo ($num > 0) ? '<a href="../configuracion/configuracion.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                  </div>
                </div>


              <?php
              }
              ?>



              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $query = mysqli_query($con, "select * from planes ") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Planes</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/planes.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../planes/planes.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>





              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 0;
                      $select = mysqli_query($con, "SELECT * FROM clientes ") or die(mysqli_error($con));
                      $num = mysqli_num_rows($select);
                      echo $num;
                      ?>
                    </h4>
                    <p>Clientes</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/school.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../cliente/cliente.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>



              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">

                    <h4>
                      <?php
                      $num = 1;
                      $select = mysqli_query($con, "SELECT * FROM plan_cliente ") or die(mysqli_error($con));

                      echo $num;
                      ?>
                    </h4>
                    <p>Registro Entrada Membresia</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/membrecia.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../ventas_menbrecia/ventas_planes_lista.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>


              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">

                    <h4>
                      <?php

                      $num = 1;
                      $query = mysqli_query($con, "select * from pedidos ") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Ventas productos</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/fair.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../ventas/pos.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>

            </div>
            <!--row-->




          </div><!-- /.col (right) -->



          <div class="box-body">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">

                    <h4>
                      <?php

                      $num = 1;
                      $query = mysqli_query($con, "select * from venta_diaria ") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Ventas diaria</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/fair.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../venta_dia/venta_diaria.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                  <div class="inner">

                    <h4>
                      <?php

                      $num = 1;
                      $query = mysqli_query($con, "select * from plan_cliente ") or die(mysqli_error($con));
                      $i = 0;
                      while ($row = mysqli_fetch_array($query)) {
                        $num++;
                      }
                      echo $num;
                      ?>
                    </h4>
                    <p>Ventas planes</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/fair.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../ventas_menbrecia/pos.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">

                    <h4>
                      <?php

                      $num = 1;

                      echo $num;
                      ?>
                    </h4>
                    <p>Mensajes</p>
                  </div>
                  <div class="icon"><img height="80" width="80" src="img/message.png">
                    <i class=""></i>
                  </div>
                  <?php echo ($num > 0) ? '<a href="../mensaje/mensaje.php" class="small-box-footer">Mas info<i class="fa fa-arrow-circle-right"></i></a>' : '<a href="#" class="small-box-footer">-------</a>'; ?>
                </div>
              </div>
            </div>

          </div>


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


  <!-- /gauge.js -->
</body>

</html>