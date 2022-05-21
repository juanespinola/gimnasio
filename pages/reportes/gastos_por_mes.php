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
                        <form method="post" action="gastos_por_mes.php" enctype="multipart/form-data" class="form-horizontal">
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
                    <div class="box-header">
                        <h3 class="box-title">Gastos</h3>
                    </div>
                    <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión</a>



                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10%">Fecha</th>
                                    <th style="width:10%">Descripcion</th>
                                    <th style="width:10%">Monto Gastado </th>
                                    <th style="width:10%">Sucursal </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_POST['fecha']) {
                                    $fecha = $_POST['fecha'];
                                    $sql = "SELECT 
                                    g.id_gastos,
                                    g.fecha,
                                    g.descripcion,
                                    g.cantidad,
                                    s.descripcion as sucursal
                                    FROM gastos g
                                    JOIN sucursales s ON g.id_sucursal = s.id_sucursal
                                    WHERE date_format(fecha, '%Y-%m-%d') = '$fecha'
                                    ORDER BY id_gastos DESC";
                                } else {
                                    $sql = "SELECT 
                                    g.id_gastos,
                                    g.fecha as fecha,
                                    g.descripcion as descripcion,
                                    g.cantidad as cantidad,
                                    s.descripcion as sucursal
                                    FROM gastos g
                                    JOIN sucursales s ON g.id_sucursal = s.id_sucursal
                                    ORDER BY id_gastos DESC";
                                }

                                $gastos = mysqli_query($con, $sql) or die(mysqli_error($con));

                                echo $sql;

                                while ($row = mysqli_fetch_array($gastos)) {
                                    $id_gasto = $row['id_gastos'];

                                ?>
                                    <tr>
                                        <td><?php echo $row['fecha']; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['cantidad']; ?></td>
                                        <td><?php echo $row['sucursal']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" style="text-align:left">Total</th>
                                    <th colspan="3"></th>
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
                            "info": false,
                            "lengthChange": false,
                            "searching": false,
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
                                    .column(2)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0);

                                // Update footer
                                $(api.column(2).footer()).html(
                                    total + ' Gs'
                                );
                            }
                        });
                    });
                </script>
</body>

</html>