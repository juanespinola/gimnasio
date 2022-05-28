<?php include '../layout/header.php';
$id_sucursal = $_SESSION['id_sucursal'];
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
        .caja {
          margin: auto;
          max-width: 250px;
          padding: 20px;
          border: 1px solid #BDBDBD;
        }

        .caja select {
          width: 100%;
          font-size: 16px;
          padding: 5px;
        }

        .resultados {
          margin: auto;
          margin-top: 40px;
          width: 1000px;
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


        <div class="panel-heading">


        </div>

        <!--end of modal-->


        <div class="box-header">
          <h3 class="box-title"> </h3>

        </div><!-- /.box-header -->
        <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>


        <div class="box-body">
          <div class="box-header">
            <h3 class="box-title">Alumnos por Profesores</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="resultados">
              <canvas id="grafico"></canvas>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.box-body -->
  </div>

  <?php include '../layout/datatable_script.php'; ?>

  <footer>
    <div class="pull-right">
      <a href="">Cronos Academy</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->




  <script>
    $(document).ready(function() {

      mostrarResultados();

    });

    function mostrarResultados() {
      // $('.resultados').html('<canvas id="grafico"></canvas>');
      $.ajax({
        type: 'POST',
        url: 'php/procesar.php',
        data: {
          'profesor': 'profesor'
        },
        dataType: 'JSON',
        success: function(response) {

          let data = response.data;
          let profes = [];
          let alumnos = [];

          data.forEach(element => {
            console.log(element)
            profes.push(element.profesor);
            alumnos.push(element.cant_alumnos);
          });

          var Datos = {
            labels: profes,
            datasets: [{
              fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
              strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
              highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
              highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
              data: alumnos
            }]
          }


          var contexto = document.getElementById('grafico').getContext('2d');
          window.Barra = new Chart(contexto).Bar(Datos, {
            responsive: true
          });
          Barra.clear();
        }
      });
      // return false;
    }
  </script>

</body>

</html>