<?php include '../layout/header.php';

$id_sucursal = $_SESSION['id_sucursal'];
$id_evento = $_GET['id_evento'];
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
                <a class="btn btn-warning btn-print" href="../eventos/eventos.php" role="button">Regresar</a>
                <a class="btn btn-warning btn-print" href="<?php echo "../evento_productos/agregar_evento_producto.php?id_evento=$id_evento" ?>" role=" button">Agregar</a>

                <div class="box-body">

                    <div class="box-header">
                        <h3 class="box-title">Lista de Productos</h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">

                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class=" btn-success">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio compra</th>
                                    <th>Precio venta</th>
                                    <th>Stock</th>
                                    <th class="btn-print"> Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $branch=$_SESSION['branch'];
                                $query = mysqli_query($con, "SELECT * FROM evento_productos WHERE id_evento = '$id_evento'") or die(mysqli_error($con));
                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $imagen_producto = $row['imagen'];
                                    $id_producto = $row['id_evento_producto'];
                                    $i++;
                                ?>
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['precio_compra']; ?></td>
                                        <td><?php echo $row['precio_venta']; ?></td>
                                        <td><?php echo $row['stock']; ?></td>
                                        <td>
                                            <a class="btn btn-danger btn-print" title="Sin Stock Producto" href="<?php echo "eliminar_evento_producto.php?id_evento=$id_evento&id_evento_producto=$id_producto"; ?>" onClick="return confirm('¿Está seguro de que quieres dejar sin stock el producto?');">Limpiar Stock</a>
                                            <a class="btn btn-success btn-print" href="<?php echo "editar_evento_producto.php?id_evento=$id_evento&id_evento_producto=$id_producto"; ?>">Editar Producto</a>
                                            <a class="btn btn-primary btn-print" href="<?php echo "agregar_stock_evento_producto.php?id_evento=$id_evento&id_evento_producto=$id_producto"; ?>" role="button">Agregar stock</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div><!-- /.box-body -->

    </div>
    <!-- /page content -->

    <!-- footer content -->
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