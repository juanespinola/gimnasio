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
                        <form method="post" action="eventos_ingresos_egresos.php" enctype="multipart/form-data" class="form-horizontal">
                            <button class="btn btn-danger btn-print" id="daterange-btn" name="buscar_fechas">Buscar</button>
                            <div class="col-md-10 btn-print">
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Evento </label>
                                    <div class="input-group col-sm-8">
                                        <select class="form-control pull-right" name="evento" id="evento">
                                            <option value="0" selected>Seleccione Opcion</option>
                                            <?php
                                            $eventos = mysqli_query($con, "SELECT * FROM eventos WHERE estado='finalizado'") or die(mysqli_error($con));
                                            while ($evento = mysqli_fetch_array($eventos)) {
                                            ?>
                                                <option value="<?php echo $evento['id_evento']; ?>"><?php echo $evento['descripcion']; ?> - (<?php echo $evento['fecha_inicio']; ?>) </option>
                                            <?php } ?>
                                        </select>
                                        <!-- <input type="date" class="form-control pull-right" id="id_evento" name="id_evento"> -->
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
                        <h3 class="box-title">Eventos - Ingresos/Egresos</h3>
                    </div>
                    <div class="box-body">
                        <table id="eventos_tabla" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10%">Nombre del Evento</th>
                                    <th style="width:10%">Fecha del Evento</th>
                                    <th style="width:10%">Total de Ingresos</th>
                                    <th style="width:10%">Total de Egresos</th>
                                    <th style="width:10%">Diferencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_POST['evento']) {
                                    $id_evento = $_POST['evento'];
                                    $sql = "SELECT 
                                    e.descripcion,
                                    e.fecha_fin,
                                    (SELECT SUM(monto_total) FROM evento_ventas ev WHERE e.id_evento = ev.id_evento) as suma_ingresos,
                                    (SELECT SUM(cantidad) FROM evento_gastos eg WHERE e.id_evento = eg.id_evento) as suma_egresos
                                    FROM eventos e
                                    WHERE e.estado = 'finalizado' AND e.id_evento = '$id_evento'";
                                } else {
                                    $sql = "SELECT 
                                    e.descripcion,
                                    e.fecha_fin,
                                    (SELECT SUM(monto_total) FROM evento_ventas ev WHERE e.id_evento = ev.id_evento) as suma_ingresos,
                                    (SELECT SUM(cantidad) FROM evento_gastos eg WHERE e.id_evento = eg.id_evento) as suma_egresos
                                    FROM eventos e
                                    WHERE e.estado = 'finalizado'
                                    ORDER BY e.id_evento DESC";
                                }

                                $query = mysqli_query($con, $sql) or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['fecha_fin']; ?></td>
                                        <td><?php echo $row['suma_ingresos']; ?></td>
                                        <td><?php echo $row['suma_egresos']; ?></td>
                                        <td><?php echo $row['suma_ingresos'] - $row['suma_egresos']; ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="1" style="text-align:left">Total</th>
                                    <th colspan="1"></th>
                                    <th colspan="1"></th>
                                    <th colspan="1"></th>
                                    <th colspan="1"></th>

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
                        $('#eventos_tabla').dataTable({
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
                                total_ingresos = api
                                    .column(2)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0);

                                // Update footer
                                $(api.column(2).footer()).html(
                                    total_ingresos + ' Gs'
                                );

                                total_egresos = api
                                    .column(3)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0);

                                // Update footer
                                $(api.column(3).footer()).html(
                                    total_egresos + ' Gs'
                                );

                                total_dif = api
                                    .column(4)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0);

                                // Update footer
                                $(api.column(4).footer()).html(
                                    total_dif + ' Gs'
                                );
                            }
                        });
                    });
                </script>
</body>

</html>