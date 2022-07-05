<?php include '../layout/header.php';

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
                    <h3 class="box-title"> Producto </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="evento_productos.php" role="button">Regresar</a>
                <div class="box-body">

                    <form class="form-horizontal" method="post" action="insert_evento_producto.php" enctype='multipart/form-data'>
                        <input type="hidden" class="form-control" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>">
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Nombre</label>

                                </div><!-- /.form group -->
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="nombre_producto_evento" name="nombre_producto_evento" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Descripcion</label>

                                </div><!-- /.form group -->
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <textarea class="form-control" id="descripcion_producto_evento" name="descripcion_producto_evento"></textarea>


                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Precio Compra</label>

                                </div><!-- /.form group -->
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="precio_compra_producto_evento" name="precio_compra_producto_evento" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Precio venta</label>

                                </div><!-- /.form group -->
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="precio_venta_producto_evento" name="precio_venta_producto_evento" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Stock inicial</label>

                                </div><!-- /.form group -->
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="stock_producto_evento" name="stock_producto_evento" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Guardar</button>


                        <div class="modal-footer">


                        </div>
                    </form>

                </div><!-- /.box-body -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.box-body -->



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