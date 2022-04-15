<?php include '../layout/header.php'; ?>

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
                <?php
                if (isset($_REQUEST['id_tipo_cliente'])) {
                    $id_tipo_cliente = $_REQUEST['id_tipo_cliente'];
                } else {
                    $id_tipo_cliente = $_POST['id_tipo_cliente'];
                }

                ?>

                <div class="box-header">
                    <h3 class="box-title">Editar Tipo Cliente</h3>
                </div><!-- /.box-header -->

                <a class="btn btn-warning btn-print" href="tipos_clientes.php" role="button">Regresar</a>
                <?php
                // $branch=$_SESSION['branch'];
                $query = mysqli_query($con, "select * from tipos_clientes where id_tipo_cliente= '$id_tipo_cliente' ") or die(mysqli_error($con));
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                    $id_tipo_cliente = $row['id_tipo_cliente'];
                ?>
                    <form class="form-horizontal" method="post" action="update_tipo_cliente.php" enctype='multipart/form-data'>
                        <input type="hidden" class="form-control" id="id_tipo_cliente" name="id_tipo_cliente" value="<?php echo $row['id_tipo_cliente']; ?>" required>
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>

                                </div><!-- /.form group -->
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="estado">Estado</label>

                                </div><!-- /.form group -->
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <select class="form-control select2" name="estado" id="estado" required>
                                        <option value="activo" <?php if ($row['estado'] == "activo") {
                                                                    echo "selected";
                                                                } ?>>Activo</option>
                                        <option value="inactivo" <?php if ($row['estado'] == "inactivo") {
                                                                        echo "selected";
                                                                    } ?>>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary">Guardar</button>


                        <br><br><br>
                        <hr>
                        <div class="modal-footer">


                        </div>
                    </form>

                    <!--end of modal-->

                <?php } ?>

            </div><!-- /.box-body -->

        </div><!-- /.col -->


    </div><!-- /.row -->

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
    // }    
    ?>



    <!-- /gauge.js -->
</body>

</html>