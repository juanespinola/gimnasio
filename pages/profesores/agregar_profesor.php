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


                <div class="panel-heading">


                </div>

                <!--end of modal-->


                <div class="box-header">
                    <h3 class="box-title"> Agregar Profesor </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="profesores.php" role="button">Regresar</a>
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="insert_profesor.php" enctype='multipart/form-data'>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="nombre" name="nombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="apellido" name="apellido" placeholder="Apellido" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="email" class="form-control pull-right" id="email" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="ruc">RUC</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="ruc" name="ruc" placeholder="Ruc" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="documento">Documento</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="documento" name="documento" placeholder="Documento" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="text" class="form-control pull-right" id="telefono" name="telefono" placeholder="Telefono" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha Nacimiento</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">

                                    <input type="date" class="form-control pull-right" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <div class="modal-footer">
                        </div>
                    </form>

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





    <!-- /gauge.js -->
</body>

</html>