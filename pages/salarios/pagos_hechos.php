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

    <?php
    if (isset($_REQUEST['id_actividad'])) {
        $id_actividad = $_REQUEST['id_actividad'];
    } else {
        $id_actividad = $_POST['id_actividad'];
    }


    ?>
    <?php
    if ($tipo == "administrador" or $tipo == "empleado") {
    ?>

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
                    <!--end of modal-->

                    <div class="box-header">
                        <h3 class="box-title"> Pagos Realizados</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <a class="btn btn-warning btn-print" href="salario_profesores.php" role="button">Regresar</a>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:30%">Actividad</th>
                                    <th style="width:10%">Fecha de pago</th>
                                    <th style="width:10%">Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM usuario u INNER JOIN  sueldo_pago sp ON sp.id_usuario = u.id where sp.id_usuario='$id_usuario' ") or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></td>
                                        <td><?php echo $row['fecha_pago']; ?></td>
                                        <td><?php echo $row['pago']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
        <!-- /footer content -->

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
    }
    ?>

    <!-- /gauge.js -->
</body>

</html>