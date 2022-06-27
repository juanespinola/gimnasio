<?php include '../layout/header.php';

?>

<!-- Font Awesome -->
<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<!-- <link rel="stylesheet" href="../layout/plugins/timepicker/bootstrap-timepicker.min.css"> -->
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
<!-- <script src="../ventas/public/js/jquery.min.js"></script> -->

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
                    color: black;
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
                    <h3 class="box-title"> Agregar Actividad </h3>

                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="cuotas.php" role="button">Regresar</a>
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="insert_pago_cuota.php" enctype='multipart/form-data'>

                        <!-- CAMPO deporte -->
                        <div class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Metodo de Pago</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="hidden" class="form-control pull-right" id="id_actividad" name="id_actividad" value="<?php echo $_GET['id_actividad']; ?>">
                                    <select class="form-control pull-right" name="metodo_pago" id="metodo_pago">
                                        <option value="0" selected>Seleccione Opcion</option>
                                        <?php
                                        $metodos_pago = mysqli_query($con, "SELECT * FROM metodos_pago") or die(mysqli_error($con));
                                        while ($metodo_pago = mysqli_fetch_array($metodos_pago)) {
                                        ?>
                                            <option value="<?php echo $metodo_pago['id_metodo_pago']; ?>"><?php echo $metodo_pago['descripcion']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                            </div>

                            <div class="col-md-4 btn-print">

                            </div>
                        </div>

                        <div id="row_comprobante" style="display:none" class="row">
                            <div class="col-md-3 btn-print">
                                <div class="form-group">
                                    <label for="descripcion">Nro Comprobante</label>
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" id="nro_comprobante" name="nro_comprobante" placeholder="Nro Comprobante">
                                </div>
                            </div>
                            <div class="col-md-4 btn-print">

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <div class="modal-footer">
                        </div>
                    </form>

                </div><!-- /.box-body -->


            </div><!-- /.col -->


        </div><!-- /.row -->

    </div><!-- /.box-body -->



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
        $(document).on('change', '#metodo_pago', function(event) {
            //  $('#servicioSelecionado').val($("#servicio option:selected").text());
            if ($("#metodo_pago option:selected").val() != 1) {
                $('#row_comprobante').hide()
            } else {
                $('#row_comprobante').show()
            }
        });
    </script>

    <!-- <script src="../layout/plugins/timepicker/bootstrap-timepicker.min.js"></script> -->
    <script src="../layout/plugins/select2/select2.min.js"></script>
</body>

</html>