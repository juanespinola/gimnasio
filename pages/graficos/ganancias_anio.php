<?php include '../layout/header.php'; ?>

<!-- Font Awesome -->
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
        .caja {
          margin: auto;
          max-width: 250px;
          padding: 20px;
          border: 1px solid #BDBDBD;
        }

        .caja select {
          width: 100%;
          font-size: 16px;
          padding: 5px;
        }

        .resultados {
          margin: auto;
          margin-top: 40px;
          width: 1000px;
        }
      </style>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x-panel">

            </div>
          </div>
        </div>




        <div class="container">

        </div>

        <div class="box-body">
          <a class="btn btn-success btn-print" href="../layout/inicio.php" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Imprimir</a>

          <?php

          $cantidad_enero = 0;
          $cantidad_febrero = 0;
          $cantidad_marzo = 0;
          $cantidad_abril = 0;
          $cantidad_mayo = 0;
          $cantidad_junio = 0;
          $cantidad_julio = 0;
          $cantidad_agosto = 0;
          $cantidad_setiembre = 0;
          $cantidad_octubre = 0;
          $cantidad_noviembre = 0;
          $cantidad_diciembre = 0;

          $year = date("Y");

          $enero_inicio = $year . "-01-01";
          $enero_fin = $year . "-01-31";
          $febrero_inicio = $year . "-02-01";
          $febrero_fin = $year . "-02-28";
          $marzo_inicio = $year . "-03-01";
          $marzo_fin = $year . "-03-31";
          $abril_inicio = $year . "-04-01";
          $abril_fin = $year . "-04-30";
          $mayo_inicio = $year . "-05-01";
          $mayo_fin = $year . "-05-31";
          $junio_inicio = $year . "-06-01";
          $junio_fin = $year . "-06-30";
          $julio_inicio = $year . "-07-01";
          $juio_fin = $year . "-07-31";
          $agosto_inicio = $year . "-08-01";
          $agosto_fin = $year . "-08-31";
          $setiembre_inicio = $year . "-09-01";
          $setiembre_fin = $year . "-09-30";
          $octubre_inicio = $year . "-10-01";
          $octubre_fin = $year . "-10-31";
          $noviembre_inicio = $year . "-11-01";
          $noviembre_fin = $year . "-11-30";
          $diciembre_inicio = $year . "-12-01";
          $diciembre_fin = $year . "-12-31";

          ?>

          <?php
          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$enero_inicio' and fecha_inicio <='$enero_fin' ") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_enero = $row['precio'] + $cantidad_enero;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$febrero_inicio' and fecha_inicio <='$febrero_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_febrero = $row['precio'] + $cantidad_febrero;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$marzo_inicio' and fecha_inicio <='$marzo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_marzo = $row['precio'] + $cantidad_marzo;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$abril_inicio' and fecha_inicio <='$abril_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_abril = $row['precio'] + $cantidad_abril;
            $cantidad_abril++;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$mayo_inicio' and fecha_inicio <='$mayo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_mayo = $row['precio'] + $cantidad_mayo;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$junio_inicio' and fecha_inicio <='$junio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_junio = $row['precio'] + $cantidad_junio;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$julio_inicio' and fecha_inicio <='$juio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_julio = $row['precio'] + $cantidad_julio;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$agosto_inicio' and fecha_inicio <='$agosto_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_agosto = $row['precio'] + $cantidad_agosto;
          }
          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$setiembre_inicio' and fecha_inicio <='$setiembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_setiembre = $row['precio'] + $cantidad_setiembre;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$octubre_inicio' and fecha_inicio <='$octubre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_octubre = $row['precio'] + $cantidad_octubre;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$noviembre_inicio' and fecha_inicio <='$noviembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_noviembre = $row['precio'] + $cantidad_noviembre;
          }

          $query = mysqli_query($con, "select * from planes AS p INNER JOIN plan_cliente AS z ON p.id_plan = z.id_plan INNER JOIN clientes AS c ON c.id_cliente = z.id_cliente   where fecha_inicio >='$diciembre_inicio' and fecha_inicio <='$diciembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_diciembre = $row['precio'] + $cantidad_diciembre;
          }

          $cantidad_enero_productos = 0;
          $cantidad_febrero_productos = 0;
          $cantidad_marzo_productos = 0;
          $cantidad_abril_productos = 0;
          $cantidad_mayo_productos = 0;
          $cantidad_junio_productos = 0;
          $cantidad_julio_productos = 0;
          $cantidad_agosto_productos = 0;
          $cantidad_setiembre_productos = 0;
          $cantidad_octubre_productos = 0;
          $cantidad_noviembre_productos = 0;
          $cantidad_diciembre_productos = 0;

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto   where p.fecha >='$enero_inicio' and p.fecha <='$enero_fin' ") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_enero_productos = $row['precio_venta'] * $row['cantidad'] + $cantidad_enero_productos;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto    where p.fecha >='$febrero_inicio' and p.fecha <='$febrero_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_febrero = $row['precio_venta'] * $row['cantidad'] + $cantidad_febrero;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto    where p.fecha >='$marzo_inicio' and p.fecha <='$marzo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_marzo = $row['precio_venta'] * $row['cantidad'] + $cantidad_marzo;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto   where p.fecha >='$abril_inicio' and p.fecha <='$abril_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_abril = $row['precio_venta'] * $row['cantidad'] + $cantidad_abril;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto   where p.fecha >='$mayo_inicio' and p.fecha <='$mayo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_mayo = $row['precio_venta'] * $row['cantidad'] + $cantidad_mayo;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto   where p.fecha >='$junio_inicio' and p.fecha <='$junio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {

            $cantidad_junio = $row['precio_venta'] * $row['cantidad'] + $cantidad_junio;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto    where p.fecha >='$julio_inicio' and p.fecha <='$juio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_julio = $row['precio_venta'] * $row['cantidad'] + $cantidad_julio;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto   where p.fecha >='$agosto_inicio' and p.fecha <='$agosto_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_agosto = $row['precio_venta'] * $row['cantidad'] + $cantidad_agosto;
          }
          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto   where p.fecha >='$setiembre_inicio' and p.fecha <='$setiembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_setiembre = $row['precio_venta'] * $row['cantidad'] + $cantidad_setiembre;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto    where p.fecha >='$octubre_inicio' and p.fecha <='$octubre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_octubre = $row['precio_venta'] * $row['cantidad'] + $cantidad_octubre;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto   where p.fecha >='$noviembre_inicio' and p.fecha <='$noviembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_noviembre = $row['precio_venta'] * $row['cantidad'] + $cantidad_noviembre;
          }

          $query = mysqli_query($con, "select * from pedidos AS p INNER JOIN detalles_pedido AS z  ON p.id_pedido = z.id_pedido INNER JOIN producto AS c ON c.id_producto = z.id_producto    where p.fecha >='$diciembre_inicio' and p.fecha <='$diciembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_diciembre = $row['precio_venta'] * $row['cantidad'] + $cantidad_diciembre;
          }

          $query = mysqli_query($con, "select * from empresa ") or die(mysqli_error($con));
          $i = 1;
          while ($row = mysqli_fetch_array($query)) {
            $por_dia = $row['por_dia'];
          }

          $cantidad_enero_gastos = 0;
          $cantidad_febrero_gastos = 0;
          $cantidad_marzo_gastos = 0;
          $cantidad_abril_gastos = 0;
          $cantidad_mayo_gastos = 0;
          $cantidad_junio_gastos = 0;
          $cantidad_julio_gastos = 0;
          $cantidad_agosto_gastos = 0;
          $cantidad_setiembre_gastos = 0;
          $cantidad_octubre_gastos = 0;
          $cantidad_noviembre_gastos = 0;
          $cantidad_diciembre_gastos = 0;

          $query = mysqli_query($con, "select * from gastos where fecha >='$enero_inicio' and fecha <='$enero_fin' ") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_enero_gastos = $row['cantidad'] + $cantidad_enero_gastos;
          }

          $query = mysqli_query($con, "select * from gastos  where fecha >='$febrero_inicio' and fecha <='$febrero_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_febrero_gastos = $row['cantidad'] + $cantidad_febrero_gastos;
          }

          $query = mysqli_query($con, "select * from gastos where fecha >='$marzo_inicio' and fecha <='$marzo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_marzo_gastos = $row['cantidad'] + $cantidad_marzo_gastos;
          }

          $query = mysqli_query($con, "select * from gastos where fecha >='$abril_inicio' and fecha <='$abril_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_abril_gastos = $row['cantidad'] + $cantidad_abril_gastos;
          }

          $query = mysqli_query($con, "select * from gastos where fecha >='$mayo_inicio' and fecha <='$mayo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_mayo_gastos = $row['cantidad'] + $cantidad_mayo_gastos;
          }

          $query = mysqli_query($con, "select * from gastos  where fecha >='$junio_inicio' and fecha <='$junio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_junio_gastos = $row['cantidad'] + $cantidad_junio_gastos;
          }

          $query = mysqli_query($con, "select * from gastos  where fecha >='$julio_inicio' and fecha <='$juio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_julio_gastos = $row['cantidad'] + $cantidad_julio_gastos;
          }

          $query = mysqli_query($con, "select * from gastos  where fecha >='$agosto_inicio' and fecha <='$agosto_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_agosto_gastos = $row['cantidad'] + $cantidad_agosto_gastos;
          }
          $query = mysqli_query($con, "select * from gastos where fecha >='$setiembre_inicio' and fecha <='$setiembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_setiembre_gastos = $row['cantidad'] + $cantidad_setiembre_gastos;
          }

          $query = mysqli_query($con, "select * from gastos  where fecha >='$octubre_inicio' and fecha <='$octubre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_octubre_gastos = $row['cantidad'] + $cantidad_octubre_gastos;
          }

          $query = mysqli_query($con, "select * from gastos where fecha >='$noviembre_inicio' and fecha <='$noviembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_noviembre_gastos = $row['cantidad'] + $cantidad_noviembre_gastos;
          }

          $query = mysqli_query($con, "select * from gastos  where fecha >='$diciembre_inicio' and fecha <='$diciembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_diciembre_gastos = $row['cantidad'] + $cantidad_diciembre_gastos;
          }

          $total_gastos = $cantidad_enero_gastos + $cantidad_febrero_gastos + $cantidad_marzo_gastos + $cantidad_abril_gastos + $cantidad_mayo_gastos + $cantidad_junio_gastos + $cantidad_julio_gastos + $cantidad_agosto_gastos + $cantidad_setiembre_gastos + $cantidad_octubre_gastos + $cantidad_noviembre_gastos + $cantidad_diciembre_gastos;

          $cantidad_enero_diario = 0;
          $cantidad_febrero_diario = 0;
          $cantidad_marzo_diario = 0;
          $cantidad_abril_diario = 0;
          $cantidad_mayo_diario = 0;
          $cantidad_junio_diario = 0;
          $cantidad_julio_diario = 0;
          $cantidad_agosto_diario = 0;
          $cantidad_setiembre_diario = 0;
          $cantidad_octubre_diario = 0;
          $cantidad_noviembre_diario = 0;
          $cantidad_diciembre_diario = 0;

          $query = mysqli_query($con, "select * from venta_diaria where fecha >='$enero_inicio' and fecha <='$enero_fin' ") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_enero_diario = $por_dia + $cantidad_enero_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria  where fecha >='$febrero_inicio' and fecha <='$febrero_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_febrero_diario = $por_dia + $cantidad_febrero_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria where fecha >='$marzo_inicio' and fecha <='$marzo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_marzo_diario = $por_dia + $cantidad_marzo_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria where fecha >='$abril_inicio' and fecha <='$abril_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_abril_diario = $por_dia + $cantidad_abril_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria where fecha >='$mayo_inicio' and fecha <='$mayo_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_mayo_diario = $por_dia + $cantidad_mayo_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria  where fecha >='$junio_inicio' and fecha <='$junio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_junio_diario = $por_dia + $cantidad_junio_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria  where fecha >='$julio_inicio' and fecha <='$juio_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_julio_diario = $por_dia + $cantidad_julio_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria  where fecha >='$agosto_inicio' and fecha <='$agosto_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_agosto_diario = $por_dia + $cantidad_agosto_diario;
          }
          $query = mysqli_query($con, "select * from venta_diaria where fecha >='$setiembre_inicio' and fecha <='$setiembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_setiembre_diario = $por_dia + $cantidad_setiembre_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria  where fecha >='$octubre_inicio' and fecha <='$octubre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_octubre_diario = $por_dia + $cantidad_octubre_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria where fecha >='$noviembre_inicio' and fecha <='$noviembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_noviembre_diario = $por_dia + $cantidad_noviembre_diario;
          }

          $query = mysqli_query($con, "select * from venta_diaria  where fecha >='$diciembre_inicio' and fecha <='$diciembre_fin'") or die(mysqli_error($con));
          while ($row = mysqli_fetch_array($query)) {
            $cantidad_diciembre_diario = $por_dia + $cantidad_diciembre_diario;
          }



          $cantidad_enero_total = 0;
          $cantidad_febrero_total = 0;
          $cantidad_marzo_total = 0;
          $cantidad_abril_total = 0;
          $cantidad_mayo_total = 0;
          $cantidad_junio_total = 0;
          $cantidad_julio_total = 0;
          $cantidad_agosto_total = 0;
          $cantidad_setiembre_total = 0;
          $cantidad_octubre_total = 0;
          $cantidad_noviembre_total = 0;
          $cantidad_diciembre_total = 0;



          $cantidad_enero_total = $cantidad_enero + $cantidad_enero_productos + $cantidad_enero_diario - $cantidad_enero_gastos;
          $cantidad_febrero_total = $cantidad_febrero + $cantidad_febrero_productos + $cantidad_febrero_diario - $cantidad_febrero_gastos;
          $cantidad_marzo_total = $cantidad_marzo + $cantidad_marzo_productos + $cantidad_marzo_diario - $cantidad_marzo_diario;
          $cantidad_abril_total = $cantidad_abril + $cantidad_abril_productos + $cantidad_abril_diario - $cantidad_abril_diario;


          $cantidad_mayo_total = $cantidad_mayo + $cantidad_mayo_productos + $cantidad_mayo_diario - $cantidad_mayo_diario;
          $cantidad_junio_total = $cantidad_junio + $cantidad_junio_productos + $cantidad_junio_diario - $cantidad_junio_diario;
          $cantidad_julio_total = $cantidad_julio + $cantidad_julio_productos + $cantidad_julio_diario - $cantidad_julio_diario;

          $cantidad_agosto_total = $cantidad_agosto + $cantidad_agosto_productos + $cantidad_agosto_diario - $cantidad_agosto_diario;
          $cantidad_setiembre_total = $cantidad_setiembre + $cantidad_setiembre_productos + $cantidad_setiembre_diario - $cantidad_setiembre_diario;
          $cantidad_octubre_total = $cantidad_octubre + $cantidad_octubre_productos + $cantidad_octubre_diario - $cantidad_octubre_diario;

          $cantidad_noviembre_total = $cantidad_noviembre + $cantidad_noviembre_productos + $cantidad_noviembre_diario - $cantidad_noviembre_diario;
          $cantidad_diciembre_total = $cantidad_diciembre + $cantidad_diciembre_productos + $cantidad_diciembre_diario - $cantidad_diciembre_diario;
          ?>

          <CENTER>
            <h1>GANANCIAS DEL A??O</h1>
          </CENTER>
          <div class="caja">
            <label>a??o: </label>
            <input type="text" value="<?php echo $year ?>" onChange="mostrarResultados(<?php echo $year ?>);" readonly><br>
          </div>
          <div class="resultados"><canvas id="grafico"></canvas></div>
        </div>

        <div class="box-header">

        </div>

        <div class="box-body">

        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="pull-right">
      Cronos Academy<a href="#"></a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>
  <script>
    $(document).ready(mostrarResultados(2019));
    var gastos = "<?php echo ''; ?>";

    function mostrarResultados(year) {
      $('.resultados').html('<canvas id="grafico"></canvas>');
      $.ajax({
        type: 'POST',
        url: 'php/procesar.php',
        data: 'year=' + year,
        dataType: 'JSON',
        success: function(response) {
          var Datos = {
            labels: ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'],
            datasets: [{
              fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
              strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
              highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
              highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
              data: ["<?php echo round($cantidad_enero); ?>", "<?php echo round($cantidad_febrero); ?>", "<?php echo round($cantidad_marzo); ?>", "<?php echo round($cantidad_abril); ?>", "<?php echo round($cantidad_mayo); ?>", "<?php echo round($cantidad_junio); ?>", "<?php echo round($cantidad_julio); ?>", "<?php echo round($cantidad_agosto); ?>", "<?php echo round($cantidad_setiembre); ?>", "<?php echo round($cantidad_octubre); ?>", "<?php echo round($cantidad_noviembre); ?>", "<?php echo round($cantidad_diciembre); ?>"]
            }]
          }
          var contexto = document.getElementById('grafico').getContext('2d');
          window.Barra = new Chart(contexto).Bar(Datos, {
            responsive: true
          });
          Barra.clear();
        }
      });
      return false;
    }
  </script>

  <?php
  // }
  # code...

  ?>
  <!-- /gauge.js -->
</body>

</html>