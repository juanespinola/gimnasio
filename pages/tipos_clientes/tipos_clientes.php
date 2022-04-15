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
                <a class="btn btn-warning btn-print" href="agregar_tipo_cliente.php" role="button">Agregar</a>

                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">Tipos de Cliente</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th class="btn-print"> Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $branch=$_SESSION['branch'];
                                $query = mysqli_query($con, "select * from tipos_clientes tc") or die(mysqli_error($con));
                                $i = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $id_tipo_cliente = $row['id_tipo_cliente'];
                                ?>
                                    <tr>
                                        <td><?php echo $row['id_tipo_cliente']; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td>
                                            <a class="small-box-footer btn-print" title="Editar Tipo Cliente" href="<?php echo "editar_tipo_cliente.php?id_tipo_cliente=$id_tipo_cliente"; ?>"><i class="glyphicon glyphicon-edit text-blue"></i></a>
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