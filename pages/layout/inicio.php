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
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="activar_dashboard">
            <label class="custom-control-label" for="customSwitch1">Activar Dashboard</label>
          </div>
        </div>

        <div id="dashboard_div" style="display: none;">
          <?php include '../layout/dashboard.php'; ?>
        </div>
        <div id="sliders_div" style="display: block;">
          <?php include '../layout/sliders.php'; ?>
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

      $('#activar_dashboard').on('click', function() {
        if ($('#activar_dashboard').is(':checked')) {
          $('#dashboard_div').show()
        } else {
          $('#dashboard_div').hide()
        }
      });
    });
  </script>

</body>

</html>