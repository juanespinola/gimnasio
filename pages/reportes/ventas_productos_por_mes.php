<?php include '../layout/header.php'; ?>

<link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
<link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php include '../layout/main_sidebar.php'; ?>
            <?php include '../layout/top_nav.php'; ?>

            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x-panel">

                        </div>

                    </div>

                </div>
                <br>
                <div class="container">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="ventas_productos_por_mes.php" enctype="multipart/form-data" class="form-horizontal">
                            <button class="btn btn-danger btn-print" id="daterange-btn" name="buscar_fechas">Buscar</button>
                            <div class="col-md-10 btn-print">
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Fecha </label>
                                    <div class="input-group col-sm-8">
                                        <input type="date" class="form-control pull-right" id="fecha" name="fecha">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12">

                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>


                <div class="box-body">

                    <section class="content-header">

                    </section>

                    <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>


                    <div class="box-header">
                        <h3 class="box-title">Ventas Realizadas por dia</h3>
                    </div>
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
                                    <th style="width:10%">Sucursal</th>
                                    <th style="width:5%" class="btn-print"> Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_POST['fecha']) {
                                    $fecha = $_POST['fecha'];
                                    $sql = "SELECT 
                                    v.id_venta,
                                    concat(c.nombre, ' ', c.apellido) as cliente,
                                    c.dni,
                                    v.nombre_cliente,
                                    v.documento,
                                    v.fecha_actual,
                                    v.monto_total,
                                    v.id_usuario,
                                    concat(u.nombre, ' ', u.apellido) as usuario,
                                    v.estado,
                                    s.descripcion
                                    FROM ventas v
                                    LEFT JOIN clientes c ON v.id_cliente = c.id_cliente
                                    JOIN usuario u ON v.id_usuario = u.id
                                    JOIN sucursales s ON v.id_sucursal = s.id_sucursal
                                    WHERE date_format(fecha_actual, '%Y-%m-%d') = '$fecha'
                                    ORDER BY v.id_venta DESC";
                                } else {
                                    $sql = "SELECT 
                                    v.id_venta,
                                    concat(c.nombre, ' ', c.apellido) as cliente,
                                    c.dni,
                                    v.nombre_cliente,
                                    v.documento,
                                    v.fecha_actual,
                                    v.monto_total,
                                    v.id_usuario,
                                    concat(u.nombre, ' ', u.apellido) as usuario,
                                    v.estado,
                                    s.descripcion
                                    FROM ventas v
                                    LEFT JOIN clientes c ON v.id_cliente = c.id_cliente
                                    JOIN usuario u ON v.id_usuario = u.id
                                    JOIN sucursales s ON v.id_sucursal = s.id_sucursal
                                    ORDER BY v.id_venta DESC";
                                }

                                $query = mysqli_query($con, $sql) or die(mysqli_error($con));

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
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-print" href="../ventas/detalle_venta.php?id_venta=<?php echo $id_venta ?>" style="color:#fff;" role="button">Detalles</a>

                                        </td>
                                    </tr>



                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" style="text-align:left">Total</th>
                                    <th colspan="4"></th>
                                </tr>
                            </tfoot>
                        </table>

                        <footer>
                            <div class="pull-right">
                                <a href="">Cronos Academy</a>
                            </div>
                            <div class="clearfix"></div>
                        </footer>

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
                            "footerCallback": function(row, data, start, end, display) {
                                var api = this.api();

                                var intVal = function(i) {
                                    return typeof i === 'string' ?
                                        i.replace(/[\$,]/g, '') * 1 :
                                        typeof i === 'number' ?
                                        i : 0;
                                };

                                // Total over all pages
                                total = api
                                    .column(3)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0);

                                // Update footer
                                $(api.column(3).footer()).html(
                                    total + ' Gs'
                                );
                            }
                        });
                    });
                </script>
</body>

</html>