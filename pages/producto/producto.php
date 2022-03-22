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


        <div class="panel-heading">


        </div>

        <!--end of modal-->


        <div class="box-header">
          <h3 class="box-title"> </h3>

        </div><!-- /.box-header -->
        <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Imprimir</a>
        <a class="btn btn-warning btn-print" href="producto_agregar.php" role="button">Agregar</a>

        <div class="box-body">

          <div class="box-header">
            <h3 class="box-title">Lista de Productos</h3>
          </div><!-- /.box-header -->

          <div class="box-body">

            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr class=" btn-success">
                  <th>#</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Unidad</th>
                  <th>Precio compra</th>
                  <th>Precio venta</th>
                  <th>Stock</th>
                  <th class="btn-print"> Accion </th>
                </tr>
              </thead>
              <tbody>
                <?php
                // $branch=$_SESSION['branch'];
                $query = mysqli_query($con, "select * from producto where estado='activo' ") or die(mysqli_error($con));
                $i = 0;
                while ($row = mysqli_fetch_array($query)) {
                  $id_producto = $row['id_producto'];
                  $i++;
                ?>
                  <tr>

                    <td><?php echo $i; ?></td>
                    <td><IMG src="subir_producto/<?php echo $row['imagen']; ?>" style="height:50PX" /></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>

                    <td><?php echo $row['unidad']; ?></td>
                    <td><?php echo $row['precio_compra']; ?></td>
                    <td><?php echo $row['precio_venta']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td>
                      <a class="small-box-footer btn-print" title="Sin Stock Producto" href="<?php echo "eliminar_producto.php?id_producto=$id_producto"; ?>" onClick="return confirm('¿Está seguro de que quieres dejar sin stock el producto?');"><i class="glyphicon glyphicon-remove"></i></a>
                      <a class="small-box-footer btn-print" href="<?php echo "editar_producto.php?id_producto=$id_producto"; ?>"><i class="glyphicon glyphicon-edit text-blue"></i></a>
                      <a class="btn btn-primary btn-print" href="<?php echo "agregar_stock.php?id_producto=$id_producto"; ?>" role="button">Agregar stock</a>
                    </td>
                  </tr>

                  <!--end of modal-->

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
          "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
          ],


          "searching": true,
        }

      );
    });
  </script>




  <!-- /gauge.js -->
</body>

</html>