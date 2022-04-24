<?php
$fechaactual = date('Y-m-d');
$mes = date('m');
$dia = date('d');
?>


<?php
$caja_cont = 0;
$acumulado = 0;

$caja_query = mysqli_query($con, "select * from caja where estado='abierto' ") or die(mysqli_error($con));
$i = 0;
while ($row_caja = mysqli_fetch_array($caja_query)) {
  $caja_cont++;
  $acumulado = $row_caja['monto'];
}

?>
<?php
$cont_alerta = 0;
$query = mysqli_query($con, "select * from clientes  where MONTH(fecha_nacimiento)='$mes' and DAY(fecha_nacimiento)='$dia' ") or die(mysqli_error($con));
$i = 0;
while ($row = mysqli_fetch_array($query)) {
  $cont_alerta++;
}
?>

<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../usuario/subir_us/<?php echo $imagen; ?>" alt=""><?php echo $nombre; ?>

            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">

            <li><a href="../layout/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>

          </ul>
        </li>

        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../layout/images/caja.png" alt="">CAJA <?php echo "$acumulado $simbolo_moneda"; ?>

            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <?php
            if ($caja_cont == 0) {


            ?>
              <li><a href="../layout/caja.php"><i class="fa fa-money"></i> Abrir caja</a></li>
            <?php
            }
            if ($caja_cont > 0) {


            ?>

              <li><a href="../layout/caja_close.php"><i class="fa fa-money"></i> Cerrar caja</a></li>

            <?php
            }
            ?>
          </ul>
        </li>





        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../layout/img/pos.png" alt="">Ventas

            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="../ventas/agregar_venta.php">Ventas Productos</a></li>
            <!-- <li><a href="../ventas/pos.php"><i class="fa fa-money"></i> Venta productos</a></li> -->
            <!-- <li><a href="../ventas_menbrecia/pos.php"><i class="fa fa-money"></i> Venta planes</a></li> -->
            <!-- <li><a href="../venta_dia/venta_diaria.php"><i class="fa fa-money"></i> Venta entrada diaria</a></li> -->

          </ul>
          <?php
          if ($cont_alerta > 0) {
            # code...

          ?>

        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="img/alerta.png" alt=""><?php echo ' ' . $mes . ''; ?> <?php echo 'alerta clientes con cumpleaños ( ' . $cont_alerta . ' )'; ?>

            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">

            <li><a href="cliente_cumple.php"><i class="fa fa-exclamation-triangle"></i> Clientes en cumpleaños</a></li>



          </ul>
        </li>
      <?php
          }
      ?>




      </li>

      </ul>
    </nav>
  </div>
</div>