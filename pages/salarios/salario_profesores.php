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
    <?php
    if ($tipo == "administrador" or $tipo == "empleado") {
    ?>

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
                    <!--end of modal-->
                    <div class="box-header">
                        <h3 class="box-title"></h3>

                    </div><!-- /.box-header -->


                    <div class="container">
                        <div class="col-md-12">
                            <form method="post" action="salario_profesores.php" enctype="multipart/form-data" class="form-horizontal">
                                <button class="btn btn-danger btn-print" id="filtrar_alumnos" name="filtrar_alumnos">Filtrar</button>
                                <div class="col-md-8 btn-print">
                                    <div class="form-group">
                                        <label for="profesor" class="col-sm-3 control-label">Seleccione un Profesor</label>
                                        <div class="input-group col-sm-8">
                                            <select name="profesor" class="form-control select2" autofocus>
                                                <option value="0" selected>Seleccione Opcion</option>
                                                <?php
                                                $profesores = mysqli_query($con, "SELECT * FROM profesores WHERE estado='activo'") or die(mysqli_error($con));
                                                while ($profesor = mysqli_fetch_array($profesores)) {
                                                ?>
                                                    <option value="<?php echo $profesor['id_profesor']; ?>"><?php echo $profesor['nombre']; ?> <?php echo $profesor['apellido']; ?></option>
                                                <?php } ?>
                                            </select>

                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="box-header">
                        <h3 class="box-title">Lista de Profesores</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- <button type="button" class="btn btn-primary btn-print" data-toggle="modal" data-target="#miModal">Agregar Salario</button> -->
                        <a class="btn btn-warning btn-print" href="agregar_salario_profesor.php" role="button">Agregar</a>
                        <a class="btn btn-success btn-print" href="insert_pagar_salario_total_profesor.php<?php if (isset($_POST['profesor'])) { ?>?id_profesor=<?php echo $_POST['profesor']; ?><?php } ?>">Pago total</a>


                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:5%">Profesor</th>
                                    <th style="width:10%"> Alumno </th>
                                    <th style="width:6%"> Actividad</th>
                                    <th style="width:6%"> Sucursal </th>
                                    <th style="width:6%"> Pago p/ clase</th>
                                    <th style="width:1%"> Pagar parcial </th>
                                    <th style="width:1%" class="btn-print"> Pagos hechos </th>
                                    <th style="width:12%" class="btn-print"> Acciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['profesor'])) {
                                    if ($_POST['profesor'] == '0') {
                                        $query = mysqli_query($con, "SELECT sp.id_sueldo_profesor, 
                                        a.id_profesor,
                                        concat(p.nombre, ' ', p.apellido) as profesor, 
                                        p.documento,
                                        concat(c.nombre, ' ', c.apellido) as alumno, 
                                        sp.salario,
                                        a.id_actividad,
                                        d.descripcion as actividad, 
                                        s.descripcion as sucursal
                                        FROM sueldo_profesores sp
                                        LEFT JOIN actividades a ON sp.id_actividad = a.id_actividad
                                        LEFT JOIN deportes d ON a.id_deporte = d.id_deporte
                                        LEFT JOIN profesores p ON a.id_profesor = p.id_profesor
                                        LEFT JOIN clientes c ON a.id_cliente = c.id_cliente
                                        JOIN sucursales s ON a.id_sucursal = s.id_sucursal") or die(mysqli_error($con));
                                    } else {
                                        $query = mysqli_query($con, "SELECT sp.id_sueldo_profesor, 
                                        a.id_profesor,
                                        concat(p.nombre, ' ', p.apellido) as profesor, 
                                        p.documento,
                                        concat(c.nombre, ' ', c.apellido) as alumno, 
                                        sp.salario,
                                        a.id_actividad,
                                        d.descripcion as actividad,
                                        s.descripcion as sucursal
                                        FROM sueldo_profesores sp
                                        LEFT JOIN actividades a ON sp.id_actividad = a.id_actividad
                                        LEFT JOIN deportes d ON a.id_deporte = d.id_deporte
                                        LEFT JOIN profesores p ON a.id_profesor = p.id_profesor
                                        LEFT JOIN clientes c ON a.id_cliente = c.id_cliente
                                        JOIN sucursales s ON a.id_sucursal = s.id_sucursal
                                        WHERE p.id_profesor = " . $_POST['profesor']) or die(mysqli_error($con));
                                    }
                                } else {
                                    $query = mysqli_query($con, "SELECT sp.id_sueldo_profesor, 
                                    a.id_profesor,
                                    concat(p.nombre, ' ', p.apellido) as profesor, 
                                    p.documento,
                                    concat(c.nombre, ' ', c.apellido) as alumno, 
                                    sp.salario,
                                    a.id_actividad,
                                    d.descripcion as actividad,
                                    s.descripcion as sucursal
                                    FROM sueldo_profesores sp
                                    LEFT JOIN actividades a ON sp.id_actividad = a.id_actividad
                                    LEFT JOIN deportes d ON a.id_deporte = d.id_deporte
                                    LEFT JOIN profesores p ON a.id_profesor = p.id_profesor
                                    JOIN sucursales s ON a.id_sucursal = s.id_sucursal
                                    LEFT JOIN clientes c ON a.id_cliente = c.id_cliente") or die(mysqli_error($con));
                                }

                                while ($row = mysqli_fetch_array($query)) {
                                    $id_sueldo_profesor = $row['id_sueldo_profesor'];
                                    $id_profesor = $row['id_profesor'];
                                    $id_actividad = $row['id_actividad'];
                                    $sueldo = $row['salario'];
                                ?>
                                    <tr>
                                        <td><?php echo $row['profesor']; ?></td>
                                        <td><?php echo $row['alumno']; ?></td>
                                        <td><?php echo $row['actividad']; ?></td>
                                        <td><?php echo $row['sucursal']; ?></td>
                                        <td><?php echo $row['salario']; ?></td>
                                        <td><a class="btn btn-success btn-print" href="<?php echo "insert_pagar_salario_profesor.php?id_actividad=$id_actividad&id_profesor=$id_profesor&sueldo=$sueldo"; ?>">Pagar Sueldo</a></td>
                                        <td><a class="btn btn-warning btn-print" href="<?php echo "pagos_hechos.php?id_actividad=$id_actividad&id_profesor=$id_profesor"; ?>">Pagos hechos</a></td>
                                        <!-- <td><a class="btn btn-danger btn-print" href="#updateordinance<?php echo $row['id_usuario']; ?>" data-target="#updateordinance<?php echo $row['id_usuario']; ?>" data-toggle="modal" style="color:#fff;" style="height:25%; width:75%; font-size: 12px " role="button">Editar</a></td> -->
                                        <td>
                                            <a class="btn btn-danger btn-print" title="Editar Sueldo" href="<?php echo "editar_salario_profesor.php?id_sueldo_profesor=$id_sueldo_profesor"; ?>">Editar</a>
                                            <a class="btn btn-danger btn-print" title="Eliminar Sueldo" href="<?php echo "delete_salario_profesor.php?id_sueldo_profesor=$id_sueldo_profesor"; ?>">Eliminar</a>
                                            <!-- <a class="btn btn-primary btn-print" href="<?php echo "pagar_sueldo.php?id_sueldo_profesor=$id_sueldo_profesor"; ?>" role="button">Pagar Sueldo</a>
                                            <a class="btn btn-primary btn-print" href="<?php echo "pagar_sueldo.php?id_sueldo_profesor=$id_sueldo_profesor"; ?>" role="button">Pagos realizados</a> -->
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            <?php if (isset($_POST['profesor']) && $_POST['profesor'] != '0') { ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" style="text-align:left">Total a Pagar:</th>
                                        <th colspan="4"></th>
                                    </tr>
                                </tfoot>
                            <?php } ?>
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
                                .column(4)
                                .data()
                                .reduce(function(a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Total over this page
                            // pageTotal = api
                            //     .column(3, {
                            //         page: 'current'
                            //     })
                            //     .data()
                            //     .reduce(function(a, b) {
                            //         return intVal(a) + intVal(b);
                            //     }, 0);

                            // Update footer
                            $(api.column(4).footer()).html(
                                total + ' Gs'
                            );
                        }
                    }

                );
            });
        </script>

    <?php
    }
    ?>

    <!-- /gauge.js -->
</body>

</html>