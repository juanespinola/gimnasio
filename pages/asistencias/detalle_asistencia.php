<?php

session_start();
include('../../dist/includes/dbcon.php');

if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}

if (empty($_GET['id_actividad'])) {
    echo "<script>document.location='./asistencias.php'</script>";
    exit;
}


?>


<?php include '../layout/header.php'; ?>


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

                th,
                td {
                    font-size: 15px;
                    text-align: center;
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


                <div class="box-header">
                    <h3 class="box-title"></h3>

                </div>
                <div class="box-header">
                    <?php
                    $query = mysqli_query($con, "SELECT 
                        concat(c.nombre, ' ', c.apellido) as alumno
                        FROM actividades a 
                        JOIN clientes c ON a.id_cliente = c.id_cliente
                        WHERE a.id_actividad = " . $_GET['id_actividad']) or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($query)) {

                    ?>
                        <h3 class="box-title">Detalle de Asistencia <?php echo $row['alumno']; ?></h3>
                    <?php } ?>
                </div>
                <a type="button" class="btn btn-primary btn-print" href="./asistencias.php">Regresar</a>
                <div class="box-body">

                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20%">Fecha Asistencia</th>
                                <th style="width:20%">Horario</th>
                                <th style="width:20%">Profesor</th>
                                <th style="width:20%">Deporte</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = mysqli_query($con, "SELECT 
                            ac.fecha_asistencia,
                            concat(a.horario_inicio, ' - ', a.horario_final) as horario,
                            concat(p.nombre, ' ', p.apellido) as profesor,
                            d.descripcion as deporte,
                            concat(c.nombre, ' ', c.apellido) as alumno
                            FROM asistencia_clientes ac
                            JOIN actividades a ON ac.id_actividad = a.id_actividad
                            JOIN profesores p ON a.id_profesor = p.id_profesor
                            JOIN deportes d ON a.id_deporte = d.id_deporte
                            JOIN clientes c ON a.id_cliente = c.id_cliente
                            WHERE ac.id_actividad = " . $_GET['id_actividad']) or die(mysqli_error($con));

                            while ($row = mysqli_fetch_array($query)) {
                                $alumno = $row['alumno'];
                            ?>
                                <tr>
                                    <td><?php echo $row['fecha_asistencia']; ?></td>
                                    <td><?php echo $row['horario']; ?></td>
                                    <td><?php echo $row['profesor']; ?></td>
                                    <td><?php echo $row['deporte']; ?></td>
                                    <!-- <td> -->
                                    <!-- <a class="btn btn-success btn-print" href="./detalle_venta.php?<?php echo $id_venta ?>" style="color:#fff;" role="button">Detalles</a> -->
                                    <!-- <a class="btn btn-danger btn-print" href="<?php echo "eliminar_gastos.php?id_gasto=$id_gasto&cantidad=$cantidad"; ?>" role="button">Anular</a> -->
                                    <!-- </td> -->
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div><!-- /.box-body -->

            </div><!-- /.col -->


        </div><!-- /.row -->




    </div><!-- /.box-body -->


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
    //}
    # code...

    ?>

    <!-- /gauge.js -->
</body>

</html>