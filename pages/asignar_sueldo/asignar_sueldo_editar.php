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
                    <!--end of modal-dialog-->

                </div>
                <?php
                if (isset($_REQUEST['id_usuario'])) {
                    $id_usuario = $_REQUEST['id_usuario'];
                } else {
                    $id_usuario = $_POST['id_usuario'];
                }


                ?>
                <div class="box-header">
                    <h3 class="box-title"> Modificar Sueldo</h3>
                </div>
                <a class="btn btn-warning btn-print" href="asignar_sueldo.php" style="height:25%; width:15%; font-size: 12px " role="button">Regresar</a>
                <div class="box-body">

                    <?php
                    $query = mysqli_query($con, "SELECT * FROM usuario u JOIN sueldo_empleado se ON se.id_usuario = u.id WHERE se.id_usuario = '$id_usuario'") or die(mysqli_error($con));
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                        <form class="form-horizontal" method="post" action="asignar_sueldo_actualizar.php" enctype='multipart/form-data'>
                            <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $row['id_usuario']; ?>" required>
                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Empleado</label>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">
                                        <!-- <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $row['nombre']; ?> - <?php echo $row['apellido']; ?>" readonly> -->
                                        <label for=""><?php echo $row['nombre']; ?> - <?php echo $row['apellido']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 btn-print">
                                    <div class="form-group">
                                        <label for="date">Sueldo</label>
                                    </div>
                                </div>
                                <div class="col-md-4 btn-print">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="sueldo" name="sueldo" value="<?php echo $row['sueldo']; ?>" required>
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
                }

            );
        });
    </script>
    <?php
    // }    
    ?>



    <!-- /gauge.js -->
</body>

</html>