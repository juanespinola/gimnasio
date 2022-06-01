<?php include '../layout/header.php'; ?>


<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- <link rel="stylesheet" href="../layout/plugins/timepicker/bootstrap-timepicker.min.css"> -->
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
<!-- <script src="../ventas/public/js/jquery.min.js"></script> -->

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
                    color: black;
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


                <div class="panel-heading">
                </div>

                <?php
                if (isset($_REQUEST['id_evento'])) {
                    $id_evento = $_REQUEST['id_evento'];
                    $id_evento_gasto = $_REQUEST['id_evento_gasto'];
                } else {
                    $id_evento = $_GET['id_evento'];
                    $id_evento_gasto = $_GET['id_evento_gasto'];
                }

                $query = mysqli_query($con, "SELECT *
                FROM evento_gastos eg
                WHERE eg.id_evento = '$id_evento' 
                AND eg.id_evento_gasto = '$id_evento_gasto'") or die(mysqli_error($con));

                while ($row = mysqli_fetch_array($query)) {
                ?>

                    <div class="box-header">
                        <h3 class="box-title"> Editar Evento Gasto</h3>

                    </div><!-- /.box-header -->
                    <a class="btn btn-warning btn-print" href="eventos.php" role="button">Regresar</a>
                    <div class="box-body">

                        <form class="form-horizontal" method="post" action="update_evento_egreso.php" enctype='multipart/form-data'>
                            <input type="hidden" class="form-control" id='id_evento' name='id_evento' value="<?php echo $id_evento; ?>">
                            <input type="hidden" class="form-control" id='id_evento_gasto' name='id_evento_gasto' value="<?php echo $id_evento_gasto; ?>">
                            <!-- CAMPO ALUMNO -->
                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="alumno">Descripcion</label>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">
                                        <input type="text" class="form-control pull-right" id="update_descripcion_evento_egreso" name="update_descripcion_evento_egreso" value="<?php echo $row['descripcion']; ?>" required>

                                    </div>
                                </div>
                            </div>

                            <!-- CAMPO DIA -->
                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="descripcion">Monto</label>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">
                                        <input type="text" class="form-control pull-right" id="update_monto_gasto" name="update_monto_gasto" value="<?php echo $row['cantidad']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            <div class="modal-footer">
                            </div>
                        </form>

                    </div>
                <?php  } ?>

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
            });


        });
    </script>

    <script src="../layout/plugins/select2/select2.min.js"></script>
</body>

</html>