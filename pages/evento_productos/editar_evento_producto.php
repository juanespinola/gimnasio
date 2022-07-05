<?php include '../layout/header.php';

$id_evento_producto = $_GET['id_evento_producto'];
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
                </div>

                <div class="box-header">
                    <h3 class="box-title"> Modificar Producto</h3>
                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="<?php echo "evento_productos.php?id_evento=$id_evento" ?>" role="button">Regresar</a>
                <div class="box-body">
                    <?php
                    // $branch=$_SESSION['branch'];
                    $query = mysqli_query($con, "SELECT * FROM evento_productos WHERE id_evento_producto = '$id_evento_producto' ") or die(mysqli_error($con));
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <form class="form-horizontal" method="post" action="update_evento_producto.php" enctype='multipart/form-data'>
                            <input type="hidden" class="form-control" id="id_evento_producto" name="id_evento_producto" value="<?php echo $id_evento_producto; ?>" required>
                            <input type="hidden" class="form-control" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>" required>
                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Nombre</label>

                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">

                                        <input type="text" class="form-control" id="nombre_pro" name="nombre_pro" value="<?php echo $row['nombre']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Descripcion</label>

                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">
                                        <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $row['descripcion']; ?></textarea>

                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Precio compra</label>

                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">
                                        <input class="form-control" id="precio_compra" name="precio_compra" value="<?php echo $row['precio_compra']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Precio venta</label>

                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">
                                        <input class="form-control" id="precio_venta" name="precio_venta" value="<?php echo $row['precio_venta']; ?>">
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
    </div>

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

</body>

</html>