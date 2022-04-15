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
                </div>

                <div class="box-header">
                    <h3 class="box-title"> </h3>
                </div>




                <div class="container">
                    <div class="col-md-12">
                        <form method="post" action="alumnos_profesor.php" enctype="multipart/form-data" class="form-horizontal">
                            <button class="btn btn-danger btn-print" id="filtrar_alumnos" name="filtrar_alumnos">Filtrar</button>
                            <div class="col-md-8 btn-print">
                                <div class="form-group">
                                    <label for="profesor" class="col-sm-3 control-label">Seleccione un Profesor</label>
                                    <div class="input-group col-sm-8">
                                        <select name="profesor" class="form-control select2" autofocus>
                                            <option value="0" selected>Seleccione Opcion</option>
                                            <?php
                                            $profesores = mysqli_query($con, "SELECT * FROM profesores WHERE estado='activo'") or die(mysqli_error($con));
                                            while ($profesor = mysqli_fetch_array($profesores)) {
                                            ?>
                                                <option value="<?php echo $profesor['id_profesor']; ?>"><?php echo $profesor['nombre']; ?> <?php echo $profesor['apellido']; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div><!-- /.input group -->
                                </div><!-- /.form group -->
                            </div>

                        </form>
                    </div>
                </div>

                <!--end of modal-->


                <div class="box-header">
                    <h3 class="box-title"> </h3>

                </div>
                <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>

                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title"> Lista de Alumnos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres </th>
                                    <th>Apellidos </th>
                                    <th>C.I</th>
                                    <th>Telefono</th>
                                    <th>Ruc</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Estado</th>
                                    <!-- <th class="btn-print"> Accion </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['profesor'])) {
                                    if ($_POST['profesor'] == '0') {
                                        $query = mysqli_query($con, "SELECT * FROM clientes c") or die(mysqli_error($con));
                                    } else {
                                        $query = mysqli_query($con, "SELECT c.id_cliente, c.nombre, c.apellido, c.dni, c.telefono, c.ruc, c.fecha_nacimiento, c.estado 
                                        FROM  actividades a 
                                        JOIN clientes c ON a.id_cliente = c.id_cliente
                                        JOIN profesores p ON a.id_profesor = p.id_profesor WHERE a.id_profesor = " . $_POST['profesor']) or die(mysqli_error($con));
                                    }
                                } else {
                                    $query = mysqli_query($con, "SELECT * FROM clientes c") or die(mysqli_error($con));
                                }


                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $id_cliente = $row['id_cliente'];
                                    $i++;
                                ?>
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['apellido']; ?></td>
                                        <td><?php echo $row['dni']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td><?php echo $row['ruc']; ?></td>
                                        <td><?php echo $row['fecha_nacimiento']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <!-- <td>
                                            <a class="small-box-footer btn-print" title="Editar Cliente" href="<?php echo "editar_cliente.php?id_cliente=$id_cliente"; ?>"><i class="glyphicon glyphicon-edit text-blue"></i></a>
                                        </td> -->
                                    </tr>

                                <?php } ?>
                            </tbody>

                        </table>
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
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],


                    "searching": true,
                }

            );
        });
    </script>




    <!-- /gauge.js -->
</body>

</html>