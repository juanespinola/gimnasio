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
                <a class="btn btn-warning btn-print" href="agregar_evento_ingreso.php?id_evento=<?php echo $id_evento; ?>" role="button">Agregar</a>


                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">Ingresos del Evento</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Cliente</th>
                                    <th>Documento</th>
                                    <th>Fecha de Venta</th>
                                    <th>Monto Total</th>
                                    <th>Vendedor</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT 
                                ev.id_evento_venta,
                                concat(c.nombre, ' ', c.apellido) as cliente,
                                c.dni,
                                ev.nombre_cliente,
                                ev.documento,
                                ev.fecha_actual,
                                ev.monto_total,
                                ev.id_usuario,
                                concat(u.nombre, ' ', u.apellido) as usuario,
                                ev.estado
                                FROM evento_ventas ev 
                                LEFT JOIN clientes c ON ev.id_cliente = c.id_cliente
                                JOIN usuario u ON ev.id_usuario = u.id
                                WHERE ev.id_evento = '$id_evento'
                                ORDER BY ev.id_evento_venta DESC") or die(mysqli_error($con));
                                $i = 0;

                                while ($row = mysqli_fetch_array($query)) {
                                    $id_evento_venta = $row['id_evento_venta'];
                                    $cliente = (isset($row['cliente'])) ? $row['cliente'] : $row['nombre_cliente'];
                                    $documento = (isset($row['dni'])) ? $row['dni'] : $row['documento'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $cliente; ?></td>
                                        <td><?php echo $documento; ?></td>
                                        <td><?php echo $row['fecha_actual']; ?></td>
                                        <td><?php echo $row['monto_total']; ?></td>
                                        <td><?php echo $row['usuario']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-print" title="Editar Evento" href="<?php echo "detalle_evento_ingresos.php?id_evento=$id_evento&id_evento_venta=$id_evento_venta"; ?>">Detalles</a>
                                            <!-- <a class="small-box-footer btn-print" title="Eliminar Actividad" href="<?php echo "delete_evento.php?id_evento_venta=$id_evento_venta"; ?>"><i class="glyphicon glyphicon-remove text-blue" onClick="return confirm('¿Está seguro de que quieres eliminar usuario?');"></i></a> -->
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