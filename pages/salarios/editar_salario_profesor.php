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
                if (isset($_REQUEST['id_sueldo_profesor'])) {
                    $id_sueldo_profesor = $_REQUEST['id_sueldo_profesor'];
                } else {
                    $id_sueldo_profesor = $_POST['id_sueldo_profesor'];
                }

                ?>

                <div class="box-header">
                    <h3 class="box-title">Editar Sueldo</h3>
                </div><!-- /.box-header -->

                <a class="btn btn-warning btn-print" href="salario_profesores.php" role="button">Regresar</a>
                <?php
                // $branch=$_SESSION['branch'];
                $query = mysqli_query($con, "SELECT sp.id_sueldo_profesor, 
                concat(p.nombre, ' ', p.apellido) as profesor, 
                p.documento,
                concat(c.nombre, ' ', c.apellido) as alumno, 
                sp.salario,
                d.descripcion as deporte
                FROM sueldo_profesores sp
                JOIN actividades a ON sp.id_actividad = a.id_actividad
                JOIN profesores p ON a.id_profesor = p.id_profesor
                JOIN clientes c ON a.id_cliente = c.id_cliente
                JOIN deportes d ON a.id_deporte = d.id_deporte
                WHERE sp.id_sueldo_profesor= '$id_sueldo_profesor' ") or die(mysqli_error($con));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                    $id_sueldo_profesor = $row['id_sueldo_profesor'];
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
                ?>
                    <form class="form-horizontal" method="post" action="update_salario_profesor.php" enctype='multipart/form-data'>
                        <input type="hidden" class="form-control" id="id_sueldo_profesor" name="id_sueldo_profesor" value="<?php echo $row['id_sueldo_profesor']; ?>" required>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="profesor">Profesor</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <label for="" class="form-control pull-right"><?php echo $row['profesor']; ?></label>
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
                                    <label for="" class="form-control pull-right"><?php echo $row['alumno']; ?></label>
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
                                    <label for="" class="form-control pull-right"><?php echo $row['deporte']; ?></label>
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
                                    <input type="text" class="form-control" id="sueldo" name="sueldo" value="<?php echo $row['salario']; ?>" required>
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

            // $('#alumno').select2({
            //     placeholder: '',
            //     minimumInputLength: 4,
            //     allowClear: true,
            //     ajax: {
            //         // quietMillis: 200,
            //         delay: 200,
            //         url: './ajax.php',
            //         dataType: 'json',
            //         cache: true,
            //         data: function(term, page) {
            //             return {
            //                 pageSize: 10,
            //                 pageNum: page,
            //                 searchTerm: term,
            //                 action: 'alumno',
            //             };
            //         },
            //         processResults: function(data, page) {
            //             var more = (page * 10) < data.total;
            //             console.log(data);
            //             return {
            //                 results: data.data,
            //                 more: more
            //             };
            //         }
            //     }
            // });

            // $('#profesor').select2({
            //     placeholder: '',
            //     minimumInputLength: 3,
            //     allowClear: true,
            //     ajax: {
            //         // quietMillis: 200,
            //         delay: 200,
            //         url: './ajax.php',
            //         dataType: 'json',
            //         cache: true,
            //         data: function(term, page) {
            //             return {
            //                 pageSize: 10,
            //                 pageNum: page,
            //                 searchTerm: term,
            //                 action: 'profesor',
            //             };
            //         },
            //         processResults: function(data, page) {
            //             var more = (page * 10) < data.total;
            //             console.log(data);
            //             return {
            //                 results: data.data,
            //                 more: more
            //             };
            //         }
            //     }
            // });

        });
    </script>
    <script src="../layout/plugins/select2/select2.min.js"></script>
</body>

</html>