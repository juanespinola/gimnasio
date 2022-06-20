<?php include '../layout/header.php';
$id_sucursal = $_SESSION['id_sucursal'];
$id_usuario = $_SESSION['id'];


?>

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


                <div class="panel-heading">


                </div>

                <!--end of modal-->


                <div class="box-header">
                    <h3 class="box-title"> </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>
                <a class="btn btn-warning btn-print" href="agregar_recordatorio.php" role="button">Agregar</a>

                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">Recordatorios</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Fecha desde</th>
                                    <th>Fecha hasta</th>
                                    <th>Comentario</th>
                                    <th>Estado</th>
                                    <th class="btn-print"> Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT *
                                FROM recordatorios r
                                WHERE r.id_sucursal = '$id_sucursal'
                                AND r.id_usuario = '$id_usuario'") or die(mysqli_error($con));
                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $id_recordatorio = $row['id_recordatorio'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['fecha_desde']; ?></td>
                                        <td><?php echo $row['fecha_hasta']; ?></td>
                                        <td><?php echo $row['comentario']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-print" title="Editar Recordatorio" href="<?php echo "editar_recordatorio.php?id_recordatorio=$id_recordatorio"; ?>">Editar</a>
                                            <a class="btn btn-danger btn-print" title="Eliminar Recordatorio" href="<?php echo "delete_recordatorio.php?id_recordatorio=$id_recordatorio"; ?>" onClick="return confirm('¿Está seguro de que quieres eliminar usuario?');">Eliminar</a>
                                            <?php if ($row['estado'] != "finalizado") { ?>
                                                <a class="btn btn-warning btn-print" title="Marcar Completado" href="<?php echo "finalizar_recordatorio.php?id_recordatorio=$id_recordatorio"; ?>">Finalizar</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->

                </div><!-- /.col -->


            </div><!-- /.row -->




        </div><!-- /.box-body -->

    </div>



    <footer>
        <div class="pull-right">
            <a href="">Cronos Academy</a>
        </div>
        <div class="clearfix"></div>
    </footer>


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

</body>

</html>