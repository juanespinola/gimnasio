<?php

session_start();
include('../../dist/includes/dbcon.php');

if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../../index.php'</script>";
    exit;
}

if (empty($_GET['id_evento_venta'])) {
    echo "<script>document.location='../eventos/eventos.php'</script>";
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

                </div><!-- /.box-header -->

                <div class="box-header">
                    <h3 class="box-title">Detalles de Venta</h3>
                </div><!-- /.box-header -->
                <a class="btn btn-warning btn-print" href="../evento_ingresos/evento_ingresos.php?id_evento=<?php echo $_GET['id_evento']; ?>" role="button">Regresar</a>
                <div class="box-body">

                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20%">Producto</th>
                                <th style="width:20%">Descripción</th>
                                <th style="width:20%">Cantidad</th>
                                <th style="width:20%">Precio Unitario</th>
                                <th style="width:20%">Precio total</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = mysqli_query($con, "SELECT 
                            p.nombre,
                            p.descripcion,
                            vd.cantidad,
                            vd.precio_unitario,
                            vd.precio_total
                            FROM evento_ventas_detalle vd
                            JOIN evento_productos p ON vd.id_evento_producto = p.id_evento_producto
                            WHERE vd.id_evento_venta = " . $_GET['id_evento_venta']) or die(mysqli_error($con));

                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['cantidad']; ?></td>
                                    <td><?php echo $row['precio_unitario']; ?></td>
                                    <td><?php echo $row['precio_total']; ?></td>
                                    <td>
                                        <!-- <a class="btn btn-success btn-print" href="./detalle_venta.php?<?php echo $id_venta ?>" style="color:#fff;" role="button">Detalles</a> -->
                                        <!-- <a class="btn btn-danger btn-print" href="<?php echo "eliminar_gastos.php?id_gasto=$id_gasto&cantidad=$cantidad"; ?>" role="button">Anular</a> -->
                                    </td>
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