<?php include '../layout/header.php';
$id_sucursal = $_SESSION['id_sucursal'];
if (isset($_REQUEST['id_evento'])) {
    $id_evento = $_REQUEST['id_evento'];
} else {
    $id_evento = $_GET['id_evento'];
}
?>


<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
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

                <div class="panel-heading">
                </div>
                <div class="box-header">
                    <h3 class="box-title"> </h3>

                </div><!-- /.box-header -->
                <!-- <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a> -->
                <a class="btn btn-warning btn-print" href="../eventos/eventos.php" role="button">Regresar</a>
                <a class="btn btn-warning btn-print" href="agregar_evento_egreso.php?id_evento=<?php echo $id_evento; ?>" role="button">Agregar</a>


                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">Ingresos del Evento</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Monto</th>
                                    <th>Fecha de Gasto</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT *
                                FROM evento_gastos ev
                                WHERE ev.id_evento = '$id_evento'
                                ORDER BY ev.id_evento_gasto DESC") or die(mysqli_error($con));
                                $i = 0;

                                while ($row = mysqli_fetch_array($query)) {
                                    $id_evento_gasto = $row['id_evento_gasto'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['cantidad']; ?></td>
                                        <td><?php echo $row['fecha']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-print" title="Editar Gasto" href="<?php echo "editar_evento_egreso.php?id_evento=$id_evento&id_evento_gasto=$id_evento_gasto"; ?>">Editar</a>
                                            <a class="btn btn-danger btn-print" title="Eliminar Gasto" href="<?php echo "delete_evento_egreso.php?id_evento=$id_evento&id_evento_gasto=$id_evento_gasto"; ?>" onClick="return confirm('¿Está seguro de que quieres eliminar el registro?')" ;>Eliminar</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer>
        <div class=" pull-right">
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