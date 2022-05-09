<?php include '../layout/header.php';


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


            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x-panel">

                        </div>

                    </div>

                </div>


                <div class="panel-heading">


                </div>


                <div class="box-header">
                    <h3 class="box-title"> </h3>

                </div>
                <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Imprimir</a>
                <a class="btn btn-warning btn-print" href="agregar_sucursal.php" role="button">Agregar</a>

                <div class="box-body">

                    <div class="box-header">
                        <h3 class="box-title">Sucursales</h3>
                    </div>

                    <div class="box-body">

                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class=" btn-success">
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Direccion</th>
                                    <th>Estado</th>
                                    <th style="width: 25%;">Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = mysqli_query($con, "SELECT * FROM sucursales") or die(mysqli_error($con));
                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $id_sucursal = $row['id_sucursal'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['direccion']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-print" title="Editar Sucursal" href="<?php echo "./editar_sucursal.php?id_sucursal=$id_sucursal"; ?>">Editar</a>
                                            <a class="btn btn-warning btn-print" title="Agregar Usuario" href="<?php echo "./usuarios_sucursal.php?id_actividad=$id_actividad"; ?>">Usuarios</a>
                                            <a class="btn btn-danger btn-print" title="Cerrar Sucursal" href="<?php echo "./cerrar_sucursal.php?id_sucursal=$id_sucursal"; ?>" onClick="return confirm('¿Está seguro de que quieres cerrar la sucursal?');">Cerrar</a>
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