<?php include '../layout/header.php'; ?>

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
                <?php
                if (isset($_REQUEST['id_actividad'])) {
                    $id_actividad = $_REQUEST['id_actividad'];
                } else {
                    $id_actividad = $_POST['id_actividad'];
                }

                ?>

                <div class="box-header">
                    <h3 class="box-title">Editar Actividad</h3>
                </div><!-- /.box-header -->

                <a class="btn btn-warning btn-print" href="actividades.php" role="button">Regresar</a>
                <?php
                // $branch=$_SESSION['branch'];
                $query = mysqli_query($con, "SELECT 
                a.id_actividad,
                c.id_cliente as id_cliente,
                c.nombre as cliente_nombre,
                c.apellido as cliente_apellido,
                c.dni as cliente_documento,
                p.id_profesor as id_profesor,
                p.nombre as profesor_nombre,
                p.apellido as profesor_apellido,
                p.documento as profesor_documento,
                a.horario_inicio as horario_inicio, 
                a.horario_final as horario_final,
                d.id_deporte as id_deporte,
                d.descripcion as deporte,
                ad.lunes,
                ad.martes,
                ad.miercoles,
                ad.jueves,
                ad.viernes,
                ad.sabado,
                ad.domingo
                FROM actividades a
                JOIN clientes c ON a.id_cliente = c.id_cliente
                JOIN profesores p ON a.id_profesor = p.id_profesor
                JOIN deportes d ON a.id_deporte = d.id_deporte
                JOIN actividades_dias ad ON a.id_actividad = ad.id_actividad 
                WHERE a.id_actividad= '$id_actividad' ") or die(mysqli_error($con));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                    $id_actividad = $row['id_actividad'];
                    echo '<pre>';
                    print_r($row);
                    echo '</pre>';

                    $lunes =  (isset($row['lunes']) && $row['lunes'] == 1) ? $row['lunes'] : '0';
                    $martes = isset($row['martes']) ? $row['martes'] : '0';
                    $miercoles = isset($row['miercoles']) ? $row['miercoles'] : '0';
                    $jueves = isset($row['jueves']) ? $row['jueves'] : '0';
                    $viernes = isset($row['viernes']) ? $row['viernes'] : '0';
                    $sabado = isset($row['sabado']) ? $row['sabado'] : '0';
                    $domingo = isset($row['domingo']) ? $row['domingo'] : '0';

                ?>
                    <form class="form-horizontal" method="post" action="update_actividad.php" enctype='multipart/form-data'>
                        <input type="hidden" class="form-control" id="id_actividad" name="id_actividad" value="<?php echo $row['id_actividad']; ?>" required>

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
                                    <select class="form-control pull-right" name="alumno" id="alumno">
                                        <option value="0" selected>Seleccione Opcion</option>
                                        <?php
                                        $clientes = mysqli_query($con, "SELECT * FROM clientes WHERE estado='activo'") or die(mysqli_error($con));
                                        while ($cliente = mysqli_fetch_array($clientes)) {
                                        ?>
                                            <?php if ($cliente['id_cliente'] == $row['id_cliente']) { ?>
                                                <option value="<?php echo $cliente['id_cliente']  ?>" selected="selected"> <?php echo $cliente['nombre']; ?> <?php echo $cliente['apellido']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $cliente['id_cliente']  ?>"> <?php echo $cliente['nombre']; ?> <?php echo $cliente['apellido']; ?> </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
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
                                    <select class="form-control pull-right" name="profesor" id="profesor">
                                        <option value="0">Seleccione Opcion</option>
                                        <?php
                                        $profesores = mysqli_query($con, "SELECT * FROM profesores WHERE estado='activo'") or die(mysqli_error($con));
                                        while ($profesor = mysqli_fetch_array($profesores)) {
                                        ?>
                                            <?php if ($profesor['id_profesor'] == $row['id_profesor']) { ?>
                                                <option value="<?php echo $profesor['id_profesor']  ?>" selected="selected"> <?php echo $profesor['nombre']; ?> <?php echo $profesor['apellido']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $profesor['id_profesor']  ?>"> <?php echo $profesor['nombre']; ?> <?php echo $profesor['apellido']; ?> </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
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
                                        <option value="0">Seleccione Opcion</option>
                                        <?php
                                        $deportes = mysqli_query($con, "SELECT * FROM deportes WHERE estado='activo'") or die(mysqli_error($con));
                                        while ($deporte = mysqli_fetch_array($deportes)) {
                                        ?>
                                            <?php if ($deporte['id_deporte'] == $row['id_deporte']) { ?>
                                                <option value="<?php echo $deporte['id_deporte']  ?>" selected="selected"> <?php echo $deporte['descripcion']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $deporte['id_deporte']  ?>"> <?php echo $deporte['descripcion']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO DIA -->
                        <!-- <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Dia</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <select class="form-control pull-right" name="dia" id="dia">
                                        <?php
                                        $dias = mysqli_query($con, "SELECT * FROM dias") or die(mysqli_error($con));
                                        while ($dia = mysqli_fetch_array($dias)) {
                                        ?>
                                            <?php if ($dia['id_dia'] == $row['id_dia']) { ?>
                                                <option value="<?php echo $dia['id_dia']  ?>" selected="selected"> <?php echo $dia['descripcion']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $dia['id_dia']  ?>"> <?php echo $dia['descripcion']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div> -->

                        <!-- CAMPO DIA -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Horario Inicio</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="time" class="form-control pull-right" id="horario_inicio" name="horario_inicio" min="07:00" max="21:00" value="<?php echo $row['horario_inicio']; ?>" required>

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
                                    <input type="time" class="form-control pull-right" id="horario_final" name="horario_final" min="07:00" max="21:00" value="<?php echo $row['horario_final']; ?>" required>

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
                                    <!-- TODO: debemos ver como hacemos para cambiar a true false de estos checkbox -->
                                    <div class="form-check form-check-inline">
                                        <!-- <input class="form-check-input" type="checkbox" id="lunes" name="lunes" value=""> -->
                                        <?php if ($lunes == 1) { ?>
                                            <input class="form-check-input" type="checkbox" id="lunes" name="lunes" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="lunes" name="lunes" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                                    </div>
                                    <div class="form-check form-check-inline">

                                        <?php if ($row['martes'] == 1) { ?>
                                            <input class="form-check-input" type="checkbox" id="martes" name="martes" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="martes" name="martes" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="inlineCheckbox2">Martes</label>
                                    </div>
                                    <div class="form-check form-check-inline">

                                        <?php if ($row['miercoles'] == 1) { ?>
                                            <input class="form-check-input" type="checkbox" id="miercoles" name="miercoles" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="miercoles" name="miercoles" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="inlineCheckbox3">Miercoles</label>
                                    </div>
                                    <div class="form-check form-check-inline">

                                        <?php if ($row['jueves'] == 1) { ?>
                                            <input class="form-check-input" type="checkbox" id="jueves" name="jueves" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="jueves" name="jueves" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="inlineCheckbox3">Jueves</label>
                                    </div>
                                    <div class="form-check form-check-inline">

                                        <?php if ($row['viernes'] == 1) { ?>
                                            <input class="form-check-input" type="checkbox" id="viernes" name="viernes" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="viernes" name="viernes" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="inlineCheckbox3">Viernes</label>
                                    </div>
                                    <div class="form-check form-check-inline">

                                        <?php if ($row['sabado'] == 1) { ?>
                                            <input class="form-check-input" type="checkbox" id="sabado" name="sabado" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="sabado" name="sabado" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="inlineCheckbox3">Sabado</label>
                                    </div>
                                    <div class="form-check form-check-inline">

                                        <?php if ($row['domingo'] == 1) { ?>
                                            <input class="form-check-input" type="checkbox" id="domingo" name="domingo" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="domingo" name="domingo" value="">
                                        <?php } ?>
                                        <label class="form-check-label" for="inlineCheckbox3">Domingo</label>
                                    </div>

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

            $('#lunes').on('change', function() {
                let lunes = $('#lunes').is(':checked');
                if (lunes) {
                    $('#lunes').val(1);
                } else {
                    $('#lunes').val("0");
                }
            });

            $('#martes').on('change', function() {
                let martes = $('#martes').is(':checked');
                if (martes) {
                    $('#martes').val(1);
                } else {
                    $('#martes').val("0");
                }
            });

            $('#miercoles').on('change', function() {
                let miercoles = $('#miercoles').is(':checked');
                if (miercoles) {
                    $('#miercoles').val(1);
                } else {
                    $('#miercoles').val("0");
                }
            });

            $('#jueves').on('change', function() {
                let jueves = $('#jueves').is(':checked');
                if (jueves) {
                    $('#jueves').val(1);
                } else {
                    $('#jueves').val("0");
                }
            });

            $('#viernes').on('change', function() {
                let viernes = $('#viernes').is(':checked');
                if (viernes) {
                    $('#viernes').val(1);
                } else {
                    $('#viernes').val("0");
                }
            });

            $('#sabado').on('change', function() {
                let sabado = $('#sabado').is(':checked');
                if (sabado) {
                    $('#sabado').val(1);
                } else {
                    $('#sabado').val("0");
                }
            });

            $('#domingo').on('change', function() {
                let domingo = $('#domingo').is(':checked');
                if (domingo) {
                    $('#domingo').val(1);
                } else {
                    $('#domingo').val("0");
                }
            });



        });
    </script>
    <script src="../layout/plugins/select2/select2.min.js"></script>
</body>

</html>