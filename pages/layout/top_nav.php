<?php
date_default_timezone_set("America/Asuncion");
$fechaactual = date('Y-m-d');
$mes = date('m');
$dia = date('d');
$id_sucursal = $_SESSION['id_sucursal'];
include '../mi_asistencia/agregar_asistencia.php';
?>


<?php
$caja_cont = 0;
$acumulado = 0;

$caja_query = mysqli_query($con, "SELECT * FROM caja WHERE estado='abierto' AND id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
$i = 0;
while ($row_caja = mysqli_fetch_array($caja_query)) {
  $caja_cont++;
  $acumulado = $row_caja['monto'];
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

        <li>
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../layout/images/caja.png" alt="">CAJA <?php echo "$acumulado $simbolo_moneda"; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <?php if ($caja_cont == 0) { ?>
              <li><a href="../layout/caja.php"><i class="fa fa-money"></i> Abrir caja</a></li>
            <?php } ?>
            <?php if ($caja_cont > 0) { ?>
              <li><a href="../layout/caja_close.php"><i class="fa fa-money"></i> Cerrar caja</a></li>
            <?php } ?>
          </ul>
        </li>



        <li>
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../layout/img/pos.png" alt="">Ventas
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="../ventas/agregar_venta.php">Agregar Venta</a></li>
            <!-- <li><a href="../ventas/pos.php"><i class="fa fa-money"></i> Venta productos</a></li> -->
            <!-- <li><a href="../ventas_menbrecia/pos.php"><i class="fa fa-money"></i> Venta planes</a></li> -->
            <!-- <li><a href="../venta_dia/venta_diaria.php"><i class="fa fa-money"></i> Venta entrada diaria</a></li> -->
          </ul>
        </li>

        <?php
        $cumpleanos = mysqli_query($con, "SELECT * FROM clientes WHERE MONTH(fecha_nacimiento)='$mes' and DAY(fecha_nacimiento)='$dia' AND id_sucursal = '$id_sucursal'") or die(mysqli_error($con));
        if ($cumpleanos->num_rows > 0) {
        ?>
          <li>
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="../layout/img/cumpleanos.png" alt=""><?php echo 'Cumpleaños ( ' . $cumpleanos->num_rows . ' )'; ?>

              <span class="fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <?php while ($cumpleanero = mysqli_fetch_array($cumpleanos)) { ?>
                <li><a><?php echo $cumpleanero['nombre']; ?> <?php echo $cumpleanero['apellido']; ?> </a></li>
              <?php }  ?>
              <!-- <li><a href="cliente_cumple.php"><i class="fa fa-exclamation-triangle"></i> Clientes en cumpleaños</a></li> -->
            </ul>
          </li>
        <?php } ?>



        <li>
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../layout/img/gestion-redes-sociales.jpg" alt="">Redes Sociales
            <span class="fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="https://web.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i>WhatsApp Web</a></li>
            <li><a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i> Instragram</a></li>
            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
            <!-- <li><a href="../venta_dia/venta_diaria.php"><i class="fa fa-money"></i> Venta entrada diaria</a></li> -->

          </ul>
        </li>

        <li>
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="modal" aria-expanded="false" data-target="#miModalAsistencia">
            <img src="../layout/img/gestion-redes-sociales.jpg" alt=""> Marcar Asistencia
          </a>
        </li>
      </ul>

    </nav>
  </div>
</div>