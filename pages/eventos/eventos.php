<?php include '../layout/header.php';
$id_sucursal = $_SESSION['id_sucursal'];
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

                </div>

                <div class="panel-heading">
                </div>
                <div class="box-header">
                    <h3 class="box-title"> </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>
                <a class="btn btn-warning btn-print" href="agregar_evento.php" role="button">Agregar</a>

                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">Eventos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Estado</th>
                                    <th>Sucursal</th>
                                    <th style="width:33%" class="btn-print"> Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT 
                                    e.id_evento,
                                    e.descripcion,
                                    e.fecha_inicio,
                                    e.fecha_fin,
                                    s.descripcion as sucursal,
                                    e.estado
                                FROM eventos e
                                JOIN sucursales s ON e.id_sucursal = s.id_sucursal") or die(mysqli_error($con));
                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $id_evento = $row['id_evento'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['fecha_inicio']; ?></td>
                                        <td><?php echo $row['fecha_fin']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td><?php echo $row['sucursal']; ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-print" title="Editar Evento" href="<?php echo "editar_evento.php?id_evento=$id_evento"; ?>">Editar</a>
                                            <a class="btn btn-success btn-print" title="Ingresos" href="../evento_ingresos/<?php echo "evento_ingresos.php?id_evento=$id_evento"; ?>">Ingresos</a>
                                            <a class="btn btn-danger btn-print" title="Egresos" href="../evento_egresos/<?php echo "evento_egresos.php?id_evento=$id_evento"; ?>">Egresos</a>
                                            <a class="btn btn-success btn-print" title="Egresos" href="../evento_egresos/<?php echo "finalizar_evento.php?id_evento=$id_evento"; ?>">Finalizar</a>
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