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
    <?php
    //    if ($usuario=="si") {
    # code...

    ?>
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


            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x-panel">

                        </div>

                    </div>


                </div>
                <?php
                if (isset($_REQUEST['id_evento_producto'])) {
                    $id_producto = $_REQUEST['id_evento_producto'];
                } else {
                    $id_producto = $_POST['id_evento_producto'];
                }


                ?>

                <div class="box-header">
                    <h3 class="box-title">Agregar Stock Producto</h3>
                </div>

                <a class="btn btn-warning btn-print" href="<?php echo "../evento_productos/evento_productos.php?id_evento=$id_evento"; ?>" role="button">Regresar</a>

                <div class="box-body">


                    <?php

                    $query = mysqli_query($con, "SELECT * FROM evento_productos WHERE id_evento_producto= '$id_producto' ") or die(mysqli_error($con));
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                        <form class="form-horizontal" method="post" action="insert_stock_evento_producto.php" enctype='multipart/form-data'>
                            <input type="hidden" class="form-control" id="id_producto" name="id_producto" value="<?php echo $id_producto; ?>" required>
                            <input type="hidden" class="form-control" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>" required>

                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Nombre producto</label>

                                    </div><!-- /.form group -->
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">

                                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $row['nombre']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Cantidad</label>

                                    </div><!-- /.form group -->
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">

                                        <input type="number" class="form-control" id="cantidad" name="cantidad" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Agregar</button>

                            <br><br><br>
                            <hr>
                            <div class="modal-footer">


                            </div>
                        </form>

                    <?php } ?>

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