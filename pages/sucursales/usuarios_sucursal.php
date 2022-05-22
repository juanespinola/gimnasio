<?php include '../layout/header.php';

$id_sucursal = $_GET['id_sucursal'];
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
                                <tr>

                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nombre y apellidos</th>
                                    <th>Telefono</th>
                                    <th>Usuario</th>
                                    <th>Tipo Usuario</th>
                                    <th>Correo</th>
                                    <!-- <th class="btn-print"> Accion </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = mysqli_query($con, "SELECT * 
                                    FROM usuario u 
                                    WHERE id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $cid = $row['id'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $cid; ?></td>
                                        <td><img src="subir_us/<?php echo $row['imagen']; ?>" style="height:50px" alt="" /></td>
                                        <td><?php echo $row['nombre'] . '  ' . $row['apellido']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td><?php echo $row['usuario']; ?></td>
                                        <td><?php echo $row['tipo']; ?></td>
                                        <td><?php echo $row['correo']; ?></td>

                                        <!-- <td>
                                            <a class="small-box-footer btn-print" title="Eliminar Usuario" href="<?php echo "eliminar_usuario.php?cid=$cid"; ?>"><i class="glyphicon glyphicon-remove" onClick="return confirm('¿Está seguro de que quieres eliminar usuario?');"></i></a>
                                            <a class="small-box-footer btn-print" title="Cambiar Contrasena" href="<?php echo "editar_password.php?cid=$cid"; ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            <a class="small-box-footer btn-print" title="Editar Usuario" href="<?php echo "editar_usuario.php?cid=$cid"; ?>"><i class="glyphicon glyphicon-edit text-blue"></i></a>
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