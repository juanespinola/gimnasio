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


            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x-panel">

                        </div>

                    </div>


                </div>
                <?php
                if (isset($_REQUEST['id_sucursal'])) {
                    $id_sucursal = $_REQUEST['id_sucursal'];
                } else {
                    $id_sucursal = $_POST['id_sucursal'];
                }

                ?>

                <div class="box-header">
                    <h3 class="box-title">Editar Actividad</h3>
                </div>

                <a class="btn btn-warning btn-print" href="sucursales.php" role="button">Regresar</a>
                <?php

                $query = mysqli_query($con, "SELECT *
                FROM sucursales WHERE id_sucursal = " . $id_sucursal) or die(mysqli_error($con));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <form class="form-horizontal" method="post" action="update_sucursal.php" enctype='multipart/form-data'>
                        <input type="hidden" class="form-control" id="id_sucursal" name="id_sucursal" value="<?php echo $row['id_sucursal']; ?>" required>

                        <!-- CAMPO ALUMNO -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="alumno">Descripcion</label>
                                </div>
                            </div>

                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>" required>
                                </div>
                            </div>

                        </div>
                        <!-- CAMPO PROFESOR -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Direccion</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <!-- CAMPO deporte -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Estado</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <!-- <input type="hidden" class="form-control pull-right" id="alumno_input" name="alumno_input" placeholder="Alumno" required> -->
                                    <select class="form-control pull-right" name="estado" id="estado">
                                        <option value="">Seleccione Opcion</option>
                                        <option value="activo" <?php if ($row['estado'] == 'activo') {
                                                                    echo "selected";
                                                                } ?>>Activo</option>
                                        <option value="inactivo" <?php if ($row['estado'] == 'inactivo') {
                                                                        echo "selected";
                                                                    } ?>>Inactivo</option>
                                    </select>
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