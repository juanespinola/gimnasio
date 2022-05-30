<?php include '../layout/header.php';

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
                    <!--end of modal-dialog-->
                </div>


                <div class="panel-heading">


                </div>

                <!--end of modal-->


                <div class="box-header">
                    <h3 class="box-title"> Agregar Evento </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="eventos.php" role="button">Regresar</a>
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="insert_evento.php" enctype='multipart/form-data'>
                        <!-- CAMPO ALUMNO -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="alumno">Descripcion</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="descripcion_evento" name="descripcion_evento" placeholder="Nombre del Evento" required>

                                </div>
                            </div>
                        </div>


                        <!-- CAMPO DIA -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Fecha Inicio</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="date" class="form-control pull-right" id="fecha_inicio_evento" name="fecha_inicio_evento" required>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO DIA -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Fecha Fin</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="date" class="form-control pull-right" id="fecha_final_evento" name="fecha_final_evento" required>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO PLANES -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="plan">Sucursal</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <select class="form-control pull-right" name="sucursal_evento" id="sucursal_evento">
                                        <option value="0" selected>Seleccione Opcion</option>
                                        <?php
                                        $sucursales = mysqli_query($con, "SELECT * FROM sucursales WHERE estado = 'activo'") or die(mysqli_error($con));
                                        while ($sucursal = mysqli_fetch_array($sucursales)) {
                                        ?>
                                            <option value="<?php echo $sucursal['id_sucursal']; ?>"><?php echo $sucursal['descripcion']; ?></option>
                                        <?php } ?>
                                    </select>
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

            $('#alumno').select2({
                placeholder: '',
                minimumInputLength: 4,
                allowClear: true,
                ajax: {
                    // quietMillis: 200,
                    delay: 200,
                    url: './ajax.php',
                    dataType: 'json',
                    cache: true,
                    data: function(term, page) {
                        return {
                            pageSize: 10,
                            pageNum: page,
                            searchTerm: term,
                            action: 'alumno',
                        };
                    },
                    processResults: function(data, page) {
                        var more = (page * 10) < data.total;
                        console.log(data);
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                }
            });

            $('#profesor').select2({
                placeholder: '',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    // quietMillis: 200,
                    delay: 200,
                    url: './ajax.php',
                    dataType: 'json',
                    cache: true,
                    data: function(term, page) {
                        return {
                            pageSize: 10,
                            pageNum: page,
                            searchTerm: term,
                            action: 'profesor',
                        };
                    },
                    processResults: function(data, page) {
                        var more = (page * 10) < data.total;
                        console.log(data);
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                }
            });
        });
    </script>

    <script src="../layout/plugins/select2/select2.min.js"></script>
</body>

</html>