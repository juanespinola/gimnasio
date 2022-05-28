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
                    <!--end of modal-dialog-->
                </div>


                <div class="panel-heading">


                </div>

                <!--end of modal-->


                <div class="box-header">
                    <h3 class="box-title"> </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>
                <a class="btn btn-warning btn-print" href="agregar_actividad.php" role="button">Agregar</a>

                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">Actividades</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Profesor</th>
                                    <th>Horario</th>
                                    <th>Actividad</th>
                                    <th>Dia</th>
                                    <th>Plan</th>
                                    <th class="btn-print"> Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT 
                                a.id_actividad,
                                concat(c.nombre, ' ', c.apellido, ' (', c.dni,')') as cliente,
                                concat(p.nombre, ' ', p.apellido, ' (', p.documento,')') as profesor,
                                concat(a.horario_inicio, ' - ', a.horario_final) as horario,
                                d.descripcion as deporte,
                                concat(
                                IF(ad.lunes = 1, 'L', '') ,' ',
                                IF(ad.martes = 1, 'M', ''),' ',
                                IF(ad.miercoles = 1, 'MI', ''),' ',
                                IF(ad.jueves = 1, 'J', ''),' ',
                                IF(ad.viernes = 1, 'V', ''),' ',
                                IF(ad.sabado = 1, 'S', ''),' ',
                                IF(ad.domingo = 1, 'D', '')) as dias, 
                                pl.id_plan,
                                pl.nombre_plan
                                FROM actividades a
                                JOIN clientes c ON a.id_cliente = c.id_cliente
                                JOIN profesores p ON a.id_profesor = p.id_profesor
                                JOIN deportes d ON a.id_deporte = d.id_deporte
                                JOIN planes pl ON a.id_plan = pl.id_plan
                                LEFT JOIN actividades_dias ad ON a.id_actividad = ad.id_actividad
                                WHERE a.id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $id_actividad = $row['id_actividad'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['cliente']; ?></td>
                                        <td><?php echo $row['profesor']; ?></td>
                                        <td><?php echo $row['horario']; ?></td>
                                        <td><?php echo $row['deporte']; ?></td>
                                        <td><?php echo $row['dias']; ?></td>
                                        <td><?php echo $row['nombre_plan']; ?></td>
                                        <td>
                                            <a class="small-box-footer btn-print" title="Editar Actividad" href="<?php echo "editar_actividad.php?id_actividad=$id_actividad"; ?>"><i class="glyphicon glyphicon-edit text-blue"></i></a>
                                            <a class="small-box-footer btn-print" title="Eliminar Actividad" href="<?php echo "delete_actividad.php?id_actividad=$id_actividad"; ?>"><i class="glyphicon glyphicon-remove text-blue" onClick="return confirm('¿Está seguro de que quieres eliminar usuario?');"></i></a>
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