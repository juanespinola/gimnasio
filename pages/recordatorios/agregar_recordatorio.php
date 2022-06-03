<?php include '../layout/header.php'; ?>

<?php
if (isset($_REQUEST['id_recordatorio'])) {
    $id_recordatorio = $_REQUEST['id_recordatorio'];
} else {
    $id_recordatorio = $_GET['id_recordatorio'];
}
?>
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

                <div class="box-header">
                    <h3 class="box-title"> Agregar Recordatorio</h3>

                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="recordatorios.php" role="button">Regresar</a>
                <div class="box-body">

                    <form class="form-horizontal" method="post" action="insert_recordatorio.php" enctype='multipart/form-data'>
                        <input type="hidden" class="form-control" id='id_recordatorio' name='id_recordatorio' value="<?php echo $id_recordatorio; ?>">
                        <!-- CAMPO ALUMNO -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="alumno">Descripcion</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="descripcion_recordatorio" name="descripcion_recordatorio" required>

                                </div>
                            </div>
                        </div>

                        <!-- CAMPO DIA -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Recordar desde</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="date" class="form-control pull-right" id="fecha_desde_recordatorio" name="fecha_desde_recordatorio" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Recordar hasta</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="date" class="form-control pull-right" id="fecha_hasta_recordatorio" name="fecha_hasta_recordatorio" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Comentario</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="comentario_recordatorio" name="comentario_recordatorio" required>
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