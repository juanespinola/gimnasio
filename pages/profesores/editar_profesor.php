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
                if (isset($_REQUEST['id_profesor'])) {
                    $id_profesor = $_REQUEST['id_profesor'];
                } else {
                    $id_profesor = $_POST['id_profesor'];
                }

                ?>

                <div class="box-header">
                    <h3 class="box-title">Editar Profesor</h3>
                </div>

                <a class="btn btn-warning btn-print" href="profesores.php" role="button">Regresar</a>
                <?php

                $query = mysqli_query($con, "select * from profesores where id_profesor= '$id_profesor' ") or die(mysqli_error($con));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                    $id_profesor = $row['id_profesor'];
                ?>
                    <form class="form-horizontal" method="post" action="update_profesor.php" enctype='multipart/form-data'>
                        <input type="hidden" class="form-control" id="id_profesor" name="id_profesor" value="<?php echo $row['id_profesor']; ?>" required>
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Nombres </label>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="name" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Apellidos </label>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Ruc</label>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="ruc" name="ruc" value="<?php echo $row['ruc']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="documento">Documento</label>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $row['documento']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="date">Telefono</label>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Nacimiento</label>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="estado">Estado</label>

                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <select class="form-control select2" name="estado" id="estado" required>
                                        <option value="activo" <?php if ($row['estado'] == "activo") {
                                                                    echo "selected";
                                                                } ?>>Activo</option>
                                        <option value="inactivo" <?php if ($row['estado'] == "inactivo") {
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