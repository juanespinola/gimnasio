<?php
session_start();
include '../layout/dbcon.php';
if (empty($_SESSION['id'])) {
    echo "<script>document.location='../../index.php'</script>";
    exit;
}

// unset($_SESSION['carrito']);
$id_usuario = $_SESSION['id'];
$fecha_actual = date('Y-m-d');
$id_evento = $_GET['id_evento'];
$porcentaje_impuesto = 0;
$simbolo_moneda = "";
$query = mysqli_query($con, "SELECT * FROM empresa") or die(mysqli_error($con));
$i = 1;
while ($row = mysqli_fetch_array($query)) {
    $simbolo_moneda = $row['simbolo_moneda'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../ventas/css/styles.css">
    <link rel="icon" href="../../cronos_logo.jpg">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ventas</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../evento_ingresos/public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../evento_ingresos/public/css/font-awesome.css">
    <link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../evento_ingresos/public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../evento_ingresos/public/css/blue.css">

    <style type="text/css">
        #myInput {
            background-image: url('../ventas/css/buscador.png');
            /* Add a search icon to input */
            background-position: 10px 12px;
            /* Position the search icon */
            background-repeat: no-repeat;
            /* Do not repeat the icon image */
            width: 100%;
            /* Full-width */
            font-size: 16px;
            /* Increase font-size */
            padding: 12px 20px 12px 40px;
            /* Add some padding */
            border: 1px solid #ddd;
            /* Add a grey border */
            margin-bottom: 12px;
            /* Add some space below the input */
        }

        #productos {
            /* Remove default list styling */
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        /* #productos li a {
            border: 1px solid #ddd;
            margin-top: -1px;
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block;
        } */

        #producto {
            border: 1px solid #ddd;
            margin-top: -1px;
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block;
        }

        #producto:hover:not(.header) {
            background-color: #eee;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <?php
    if (!isset($_SESSION["carrito_evento"])) $_SESSION["carrito_evento"] = [];
    $granTotal = 0;
    $impuTotal = 0;
    ?>
    <div class="col-xs-12">
        <form class="form-inline" name="finalizar_venta" action="./insert_evento_ingreso.php?id_evento=<?php echo $id_evento; ?>" method="POST">
            <?php
            if (isset($_GET["status"])) {
                if ($_GET["status"] === "1") {
            ?>
                    <div class="alert alert-success">
                        <strong>¡Correcto!</strong> Venta realizada correctamente
                    </div>
                <?php
                } else if ($_GET["status"] === "2") {
                ?>
                    <div class="alert alert-info">
                        <strong>Venta cancelada</strong>
                    </div>
                <?php
                } else if ($_GET["status"] === "3") {
                ?>
                    <div class="alert alert-info">
                        <strong>Ok</strong> Producto quitado de la lista
                    </div>
                <?php
                } else if ($_GET["status"] === "4") {
                ?>
                    <div class="alert alert-warning">
                        <strong>Error:</strong> El producto que buscas no existe
                    </div>
                <?php
                } else if ($_GET["status"] === "5") {
                ?>
                    <div class="alert alert-danger">
                        <strong>Error: </strong>El producto está agotado
                    </div>
                <?php
                } else if ($_GET["status"] === "6") {
                ?>
                    <div class="alert alert-danger">
                        <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                    </div>
                <?php
                } else if ($_GET["status"] === "7") {
                ?>
                    <div class="alert alert-danger">
                        <strong>Error:</strong> No existe un total actual
                    </div>
                <?php
                } else if ($_GET["status"] === "8") {
                ?>
                    <div class="alert alert-danger">
                        <strong>Error:</strong> Debe existir un cliente o un alumno que realiza la compra
                    </div>
                <?php } else if ($_GET["status"] === "9") { ?>
                    <div class="alert alert-danger">
                        <strong>Error:</strong> Debe existir un evento
                    </div>
            <?php }
            }
            ?>

            <section class="content">
                <h4>Venta del Evento</h4>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="">
                                    <a type="button" href="../eventos/eventos.php" class="btn btn-danger">Regresar</a>
                                    <button type="submit" class="btn btn-success">Terminar venta</button>
                                </div>
                            </div>

                            <!-- <div class="container">
                                <div class="col-md-12">
                                    <div class="col-md-8 btn-print">
                                        <div class="col-12">
                                            <label for="alumno" class="col-3 control-label">Seleccione un alumno</label>
                                            <div class="input-group col-sm-8">
                                                <select class="form-control pull-right" name="alumno_evento" id="alumno_evento"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <br>
                            <div class="container">
                                <div class="col-md-12">
                                    <form method="POST" action="" enctype="multipart/form-data" class="form-horizontal">
                                        <!-- <a href="./insert_cliente_al_carrito.php?" class="btn btn-danger btn-print" id="filtrar_alumno" name="filtrar_alumno">Filtrar</a> -->
                                        <div class="col-md-8 btn-print">
                                            <div class="col-12">
                                                <label for="nombre_cliente" class="col-3 control-label">O seleccione un Cliente</label>
                                                <div class="input-group col-sm-4">
                                                    <input type="text" id="nombre_cliente_evento" name="nombre_cliente_evento" class="form-control pull-right">
                                                </div>
                                                <label for="documento_cliente" class="col-3 control-label">Y su CI</label>
                                                <div class="input-group col-sm-3">
                                                    <input type="text" id="documento_cliente_evento" name="documento_cliente_evento" class="form-control pull-right">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio de venta</th>
                                                    <th>Total</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($_SESSION["carrito_evento"] as $indice => $producto) {
                                                    $granTotal += $producto->total;
                                                    $total += $producto['precio_total'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $producto['nombre_producto']; ?></td>
                                                        <td><?php echo $producto['cantidad']; ?></td>
                                                        <td><?php echo $producto['precio_unitario']; ?></td>
                                                        <td><?php echo $producto['precio_total']; ?></td>
                                                        <td>
                                                            <a class="btn btn-danger" href="../evento_ingresos/delete_producto_entero_del_carrito.php?id_evento=<?php echo $id_evento; ?>&indice=<?php echo $indice; ?>"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                // echo "<pre>";
                                                // print_r($_SESSION);
                                                // echo "</pre>";
                                                ?>
                                            </tbody>
                                        </table>
                                        <input type="hidden" id="monto_total" name="monto_total" value="<?php echo $total; ?>">
                                        <h4>Total de Compra: <?php echo $total; ?></h4>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>

            <section>
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">


                        <div class="box-body">
                            <div class="box">

                                <div class="box-body no-padding">
                                    <div class="row">
                                        <div id="content" class="col-lg-12">
                                            <div id="suggestions"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="box-body">
                                            <input type="text" id="myInput" onkeyup="buscar_producto()" placeholder="Buscar producto..">
                                            <ul id="productos">
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM evento_productos WHERE stock>0 AND estado='activo' AND id_evento = " . $id_evento) or die(mysqli_error($con));
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $id_evento_producto = $row['id_evento_producto'];
                                                    $stock = $row['stock'];
                                                    echo '<pre>';
                                                    print_r($row);
                                                    echo '</pre>';

                                                    echo '<pre>';
                                                    print_r($_SESSION['carrito_evento']);
                                                    echo '</pre>';
                                                ?>
                                                    <div class="col-sm-3">

                                                        <div class="small-box bg-white">
                                                            <div class="inner">
                                                                <li>
                                                                    <div id="producto" role="button">
                                                                        <!-- <a href=" #updateordinance<?php echo $row['id_evento_producto']; ?>" data-target="#updateordinance<?php echo $row['id_evento_producto']; ?>" data-toggle="modal" style="color:black;" style="height:25%; width:75%; font-size: 12px " role="button"><?php echo $row['nombre']; ?> -->
                                                                        <label for=""><?php echo $row['nombre']; ?></label>
                                                                        <br>
                                                                        <?php echo $simbolo_moneda . ' ' . $row['precio_venta']; ?>
                                                                        <br>
                                                                        <label for="">Cantidad: <?php echo $row['stock']; ?></label>
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 100px; height:100px; ">
                                                                                    <!-- <img src="../producto/subir_producto/<?php echo $row['imagen']; ?>" alt="Sin Imagen" width="100px" height="100px"> -->
                                                                                </div>
                                                                                <!-- </a> -->

                                                                                <div class="col-2">
                                                                                    <a href="./insert_producto_al_carrito.php?id_evento=<?php echo $id_evento; ?>&id_evento_producto=<?php echo $id_evento_producto; ?>"><i class="fa fa-plus-circle" style="font: normal normal normal 35px/1 FontAwesome; "></i></a>
                                                                                    <a href="./delete_producto_al_carrito.php?id_evento=<?php echo $id_evento; ?>&id_evento_producto=<?php echo $id_evento_producto; ?>"><i class=" fa fa-minus-circle" style="font: normal normal normal 35px/1 FontAwesome; "></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- </tr> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </form>
    </div>

    <?php include '../layout/datatable_script.php'; ?>
    <!-- jQuery 2.1.4 -->
    <script src="../evento_ingresos/public/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../evento_ingresos/public/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../evento_ingresos/public/js/icheck.min.js"></script>
    <script>
        function buscar_producto() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("productos");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
        $(document).ready(function() {

            $('#alumno_evento').select2({
                placeholder: '',
                minimumInputLength: 4,
                allowClear: true,
                ajax: {
                    // quietMillis: 200,
                    delay: 200,
                    url: './ajax.php',
                    dataType: 'json',
                    cache: true,
                    data: function(term, page) {
                        return {
                            pageSize: 10,
                            pageNum: page,
                            searchTerm: term,
                            action: 'alumno',
                        };
                    },
                    processResults: function(data, page) {
                        var more = (page * 10) < data.total;
                        console.log(data);
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                }
            });
        })
    </script>
    <script src="../layout/plugins/select2/select2.min.js"></script>
</body>

</html>