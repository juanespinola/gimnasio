<?php include '../layout/dbcon.php'; ?>

<?php
@session_start();

// unset($_SESSION['carrito']);
$id_usuario = $_SESSION['id'];
$fecha_actual = date('Y-m-d');

$porcentaje_impuesto = 0;
$simbolo_moneda = "";
$query = mysqli_query($con, "select * from empresa") or die(mysqli_error($con));
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
    <link rel="stylesheet" href="../ventas/public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../ventas/public/css/font-awesome.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../ventas/public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../ventas/public/css/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
    $granTotal = 0;
    $impuTotal = 0;
    ?>
    <div class="col-xs-12">
        <form class="form-inline" name="finalizar_venta" action="./insert_venta.php" method="POST">
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
                } else {
                ?>
                    <div class="alert alert-danger">
                        <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                    </div>
            <?php
                }
            }
            ?>

            <section class="content">
                <h4>Venta del dia</h4>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="">
                                    <a type="button" href="../layout/<?php echo "inicio.php"; ?>" class="btn btn-danger">Regresar</a>
                                    <button type="submit" class="btn btn-success">Terminar venta</button>
                                </div>
                            </div>

                            <div class="container">
                                <div class="col-md-12">
                                    <form method="post" action="agregar_cliente.php" enctype="multipart/form-data" class="form-horizontal">
                                        <button class="btn btn-danger btn-print" id="filtrar_cliente" name="filtrar_cliente">Filtrar</button>
                                        <div class="col-md-8 btn-print">
                                            <div class="col-12">
                                                <label for="profesor" class="col-3 control-label">Seleccione un cliente</label>
                                                <div class="input-group col-sm-8">
                                                    <select class="form-control pull-right" name="cliente" id="cliente"></select>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- form start -->
                            <form id="venta_actual" name="venta_actual">
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
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($_SESSION["carrito"] as $indice => $producto) {
                                                        $granTotal += $producto->total;
                                                        $total += $producto['precio_total'];

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $producto['nombre_producto']; ?></td>
                                                            <td><?php echo $producto['cantidad']; ?></td>
                                                            <td><?php echo $producto['precio_unitario']; ?></td>
                                                            <td><?php echo $producto['precio_total']; ?></td>
                                                            <td><a class="btn btn-danger" href="../ventas/<?php echo "eliminar_producto.php?indice=$indice"; ?>"><i class="fa fa-trash"></i></a>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php
                                                    echo "<pre>";
                                                    print_r($_SESSION);
                                                    echo "</pre>";
                                                    ?>
                                                </tbody>
                                            </table>
                                            <h4> Total de Compra: <?php echo $total; ?></h4>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->


                            </form>
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
                                            <form class="form-inline" method="post" action="#">

                                            </form>
                                            <div id="suggestions"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="box-body">
                                            <input type="text" id="myInput" onkeyup="buscar_producto()" placeholder="Buscar producto..">
                                            <ul id="productos">
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM producto WHERE stock>0 AND estado='activo'") or die(mysqli_error($con));
                                                $i = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $id_producto = $row['id_producto'];
                                                    $stock = $row['stock'];
                                                ?>
                                                    <div class="col-sm-3">

                                                        <div class="small-box bg-white">
                                                            <div class="inner">
                                                                <li>
                                                                    <div id="producto" role="button">
                                                                        <!-- <a href=" #updateordinance<?php echo $row['id_producto']; ?>" data-target="#updateordinance<?php echo $row['id_producto']; ?>" data-toggle="modal" style="color:black;" style="height:25%; width:75%; font-size: 12px " role="button"><?php echo $row['nombre']; ?> -->
                                                                        <label for=""><?php echo $row['nombre']; ?></label>
                                                                        <br>
                                                                        <?php echo $simbolo_moneda . ' ' . $row['precio_venta']; ?>
                                                                        <br>
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 100px; height:100px; ">
                                                                                    <img src="../producto/subir_producto/<?php echo $row['imagen']; ?>" alt="Sin Imagen" width="100px" height="100px">
                                                                                </div>
                                                                                <!-- </a> -->

                                                                                <div class="col-2">
                                                                                    <a href="./insert_producto_al_carrito.php?id_producto=<?php echo $id_producto; ?>"><i class="fa fa-plus-circle" style="font: normal normal normal 35px/1 FontAwesome; "></i></a>
                                                                                    <a href="./delete_producto_al_carrito.php?id_producto=<?php echo $id_producto; ?>"><i class=" fa fa-minus-circle" style="font: normal normal normal 35px/1 FontAwesome; "></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <!-- </tr> -->
                                                                <!-- <div id="updateordinance<?php echo $row['id_producto']; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content" style="height:auto">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"></span></button>

                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="form-horizontal" method="post" action="../ventas/agregarAlCarrito.php">
                                                                                    <div class="row">
                                                                                        <div class="col-md-3 btn-print">
                                                                                            <div class="form-group">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-7 btn-print">
                                                                                            <div class="form-group">
                                                                                                <input type="hidden" class="form-control" id="id_producto" name="id_producto" value="<?php echo $row['id_producto']; ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-1 btn-print">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-3 btn-print">
                                                                                            <div class="form-group">


                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-7 btn-print">
                                                                                            <div class="form-group">
                                                                                                <label style="color: black;">Cantidad</label>
                                                                                                <input class="form-control" id="cantidad" name="cantidad" type="number" min="0" max="<?php echo $row['stock']; ?>" id="cantidad" placeholder="cantidad" style="width: : 100%;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-1 btn-print">

                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-3 btn-print">
                                                                                            <div class="form-group">


                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-7 btn-print">
                                                                                            <div class="form-group">

                                                                                                <button type="submit" class="btn btn-primary">Agregar</button>
                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-1 btn-print">

                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
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


    <!-- jQuery 2.1.4 -->
    <script src="../ventas/public/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../ventas/public/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../ventas/public/js/icheck.min.js"></script>
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
    </script>

</body>

</html>