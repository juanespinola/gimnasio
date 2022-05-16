<?php

/**
 * TODO: venta anulada?
 */
?>


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

                <?php
                $fechaactual = date('Y-m-d');
                $nuevafecha = strtotime('-1420 day', strtotime($fechaactual));
                $nuevafecha = date('Y-m-j', $nuevafecha);
                ?>



                <div class="box-header">
                    <h3 class="box-title"></h3>

                </div>

                <div class="box-header">
                    <h3 class="box-title">Lista de Ventas</h3>
                </div>
                <!-- <button type="button" class="btn btn-primary btn-print" data-toggle="modal" data-target="#miModal">Nuevo</button> -->
                <a class="btn btn-primary btn-print" href="../ventas/agregar_venta.php">Nuevo</a>
                <div class="box-body">

                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10%">Nombre Cliente</th>
                                <th style="width:10%">Documento</th>
                                <th style="width:10%">Fecha de Venta</th>
                                <th style="width:10%">Monto Total</th>
                                <th style="width:10%">Vendedor</th>
                                <th style="width:10%">Estado</th>
                                <th style="width:10%" class="btn-print"> Accion </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = mysqli_query($con, "SELECT 
                            v.id_venta,
                            concat(c.nombre, ' ', c.apellido) as cliente,
                            c.dni,
                            v.nombre_cliente,
                            v.documento,
                            v.fecha_actual,
                            v.monto_total,
                            v.id_usuario,
                            concat(u.nombre, ' ', u.apellido) as usuario,
                            v.estado
                            FROM ventas v
                            LEFT JOIN clientes c ON v.id_cliente = c.id_cliente
                            JOIN usuario u ON v.id_usuario = u.id
                            WHERE v.id_sucursal = '$id_sucursal'
                            ORDER BY v.id_venta DESC") or die(mysqli_error($con));

                            while ($row = mysqli_fetch_array($query)) {
                                $id_venta = $row['id_venta'];
                                $cliente = (isset($row['cliente'])) ? $row['cliente'] : $row['nombre_cliente'];
                                $documento = (isset($row['dni'])) ? $row['dni'] : $row['documento'];

                            ?>
                                <tr>
                                    <td><?php echo $cliente; ?></td>
                                    <td><?php echo $documento; ?></td>
                                    <td><?php echo $row['fecha_actual']; ?></td>
                                    <td><?php echo $row['monto_total']; ?></td>
                                    <td><?php echo $row['usuario']; ?></td>
                                    <td><?php echo $row['estado']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-print" href="./detalle_venta.php?id_venta=<?php echo $id_venta ?>" style="color:#fff;" role="button">Detalles</a>
                                        <!-- <a class="btn btn-danger btn-print" href="<?php echo "eliminar_gastos.php?id_gasto=$id_gasto&cantidad=$cantidad"; ?>" role="button">Anular</a> -->
                                    </td>
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