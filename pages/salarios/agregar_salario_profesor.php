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


                <div class="panel-heading">


                </div>

                <!--end of modal-->


                <div class="box-header">
                    <h3 class="box-title"> Agregar Sueldo </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="salario_profesores.php" role="button">Regresar</a>
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="insert_salario_profesor.php" enctype='multipart/form-data'>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="profesor">Profesor</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <select class="form-control pull-right" name="profesor" id="profesor"></select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="alumno">Alumno</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <select class="form-control pull-right" name="alumno" id="alumno"></select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="ruc">Disciplina</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
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

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="ruc">Salario</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sueldo" name="sueldo" required>
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