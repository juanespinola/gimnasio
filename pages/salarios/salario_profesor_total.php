<?php include '../layout/header.php'; ?>

<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

<body class="nav-md">
    <?php
    if (isset($_REQUEST['id_profesor'])) {
        $id_profesor = $_REQUEST['id_profesor'];
    } else {
        echo "<script type='text/javascript'>alert('Por favor, seleccione un profesor!');</script>";
        echo "<script>document.location='salario_profesores.php'</script>";
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
                    </div>
                    <!--end of modal-->

                    <div class="box-header">
                        <h3 class="box-title"> Pagar Sueldo Total</h3>
                    </div><!-- /.box-header -->
                    <a class="btn btn-warning btn-print" href="salario_profesores.php" role="button">Regresar</a>
                    <div class="box-body">

                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:30%">Nombre y Apellidos</th>
                                    <th style="width:10%"> Sueldo </th>
                                    <th style="width:30%" class="btn-print"> Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM  usuario u INNER JOIN sueldo_empleado AS s ON s.id_usuario = u.id where s.id_usuario='$id_usuario'") or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($query)) {
                                    // $cid = $row['id'];
                                    $pago = $row['sueldo'];

                                ?>
                                    <tr>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['sueldo']; ?></td>
                                        <!-- <td><a class="btn btn-success btn-print" href="<?php echo "pagar_sueldo_add.php?id_usuario=$id_usuario&pago=$pago"; ?>" onClick="return confirm('¿Está seguro que quieres pagar?');" role="button">Pagar ahora</a></td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>

                                SELECT SUM(sp.salario) as sueldo_total
                                FROM sueldo_profesores sp
                                JOIN actividades a ON sp.id_actividad = a.id_actividad
                            </tfoot>
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