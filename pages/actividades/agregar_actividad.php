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
                    <h3 class="box-title"> Agregar Actividad </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="actividades.php" role="button">Regresar</a>
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="insert_actividad.php" enctype='multipart/form-data'>
                        <!-- CAMPO ALUMNO -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="alumno">Alumno</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <!-- <input type="hidden" class="form-control pull-right" id="alumno_input" name="alumno_input" placeholder="Alumno" required> -->
                                    <select class="form-control pull-right" name="alumno" id="alumno"></select>
                                </div>
                            </div>
                        </div>
                        <!-- CAMPO PROFESOR -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Profesor</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <!-- <input type="hidden" class="form-control pull-right" id="alumno_input" name="alumno_input" placeholder="Alumno" required> -->
                                    <select class="form-control pull-right" name="profesor" id="profesor"></select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO deporte -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Deporte</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <!-- <input type="hidden" class="form-control pull-right" id="alumno_input" name="alumno_input" placeholder="Alumno" required> -->
                                    <select class="form-control pull-right" name="deporte" id="deporte">
                                        <option value="0" selected>Seleccione Opcion</option>
                                        <?php
                                        $deportes = mysqli_query($con, "SELECT * FROM deportes WHERE estado='activo'") or die(mysqli_error($con));
                                        while ($deporte = mysqli_fetch_array($deportes)) {
                                        ?>
                                            <option value="<?php echo $deporte['id_deporte']; ?>"><?php echo $deporte['descripcion']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO DIA -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Horario Inicio</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="time" class="form-control pull-right" id="horario_inicio" name="horario_inicio" min="07:00" max="21:00" required>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO DIA -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Horario Fin</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="time" class="form-control pull-right" id="horario_final" name="horario_final" min="07:00" max="21:00" required>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO PLANES -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="plan">Plan</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <select class="form-control pull-right" name="plan" id="plan">
                                        <option value="0" selected>Seleccione Opcion</option>
                                        <?php
                                        $planes = mysqli_query($con, "SELECT * FROM planes") or die(mysqli_error($con));
                                        while ($plan = mysqli_fetch_array($planes)) {
                                        ?>
                                            <option value="<?php echo $plan['id_plan']; ?>"><?php echo $plan['nombre_plan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO DIA -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Dia</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="lunes" name="lunes" value="1">
                                        <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="martes" name="martes" value="1">
                                        <label class="form-check-label" for="inlineCheckbox2">Martes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="miercoles" name="miercoles" value="1">
                                        <label class="form-check-label" for="inlineCheckbox3">Miercoles</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="jueves" name="jueves" value="1">
                                        <label class="form-check-label" for="inlineCheckbox3">Jueves</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="viernes" name="viernes" value="1">
                                        <label class="form-check-label" for="inlineCheckbox3">Viernes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="sabado" name="sabado" value="1">
                                        <label class="form-check-label" for="inlineCheckbox3">Sabado</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="domingo" name="domingo" value="1">
                                        <label class="form-check-label" for="inlineCheckbox3">Domingo</label>
                                    </div>
                                    <!-- <input type="hidden" class="form-control pull-right" id="alumno_input" name="alumno_input" placeholder="Alumno" required> -->

                                    <!-- <select class="form-control pull-right" name="dia" id="dia">
                                        <option value="0" selected>Seleccione Opcion</option>
                                        <?php
                                        $dias = mysqli_query($con, "SELECT * FROM dias") or die(mysqli_error($con));
                                        while ($dia = mysqli_fetch_array($dias)) {
                                        ?>
                                            <option value="<?php echo $dia['id_dia']; ?>"><?php echo $dia['descripcion']; ?></option>
                                        <?php } ?>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
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


            // $('#horario_inicio').timepicker({
            //     timeFormat: 'h:mm p',
            // });

            // $('#horario_final').timepicker({
            //     timeFormat: 'h:mm p',
            // });
        });
    </script>


    <!-- <script src="../layout/plugins/timepicker/bootstrap-timepicker.min.js"></script> -->
    <script src="../layout/plugins/select2/select2.min.js"></script>
</body>

</html>