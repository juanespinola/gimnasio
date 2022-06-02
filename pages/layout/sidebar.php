<?php
$id = $_SESSION['id'];
?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <!-- <h3><?php echo $empresa; ?></h3> -->

    <ul class="nav side-menu">
      <li><a href="../layout/inicio.php"><i class="fa fa-dashboard"></i>Inicio<span class="fa fa-chevron-right"></span></a></li>
      <?php if ($tipo == "administrador" or $tipo == "empleado") {  ?>
        <li>
          <a>
            <i class="fa fa-money"></i> Ingresos<span class="fa fa-chevron-down"></span>
          </a>
          <ul class="nav child_menu">
            <li><a href="../ventas/ventas.php">Ventas</a></li>
            <li><a href="../cuotas/cuotas.php">Cuotas</a></li>
          </ul>
        </li>

      <?php } ?>
      <li><a href="../gastos/gastos.php"><i class="fa fa-bank"></i> Egresos <span class="fa fa-chevron-right"></span></a></li>
      <li><a href="../planes/planes.php"><i class="fa fa-database"></i> Planes <span class="fa fa-chevron-right"></span></a></li>
      <li><a href="../layout/caja.php"><i class="fa fa-bank"></i> Caja <span class="fa fa-chevron-right"></span></a></li>

      <?php if ($tipo == "administrador") { ?>
        <li><a><i class="fa fa-money"></i>Eventos<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="../eventos/eventos.php">Mis Eventos</a></li>
            <li><a href="../reportes/eventos_ingresos_egresos.php">Reportes</a></li>
            <li><a href="../graficos/eventos_ingresos_egresos.php">Graficos</a></li>
          </ul>
        </li>
      <?php } ?>

      <?php if ($tipo == "administrador") { ?>
        <li><a><i class="fa fa-group"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../usuario/usuario.php">Usuarios</a></li>

            <li><a href="../usuario/usuario_agregar.php">Agregar</a></li>

          </ul>
        </li>
      <?php } ?>
      <?php if ($tipo == "administrador") { ?>
        <li><a><i class="fa fa-money"></i>Salarios<span class="fa fa-chevron-right"></span></a>
          <ul class="nav child_menu">
            <!-- <li><a href="../asignar_sueldo/asignar_sueldo.php">Empleados</a></li> -->
            <li><a href="../salarios/salario_profesores.php">Profesores</a></li>
          </ul>
        </li>
      <?php } ?>

      <li><a><i class="fa fa-user-md"></i> Personas<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="../cliente/cliente.php">Lista de Alumnos</a></li>
          <li><a href="../profesores/profesores.php">Lista de Profesores</a></li>
          <li><a href="../actividades/actividades.php">Actividades</a></li>
          <li><a href="../asistencias/asistencias.php">Asistencias</a></li>
          <li><a href="../alumnos_profesor/alumnos_profesor.php">Alumnos por Profesor</a></li>
          <li><a href="../alumnos_deporte/alumnos_deporte.php">Alumnos por Disciplinas</a></li>
        </ul>
      </li>


      <?php if ($tipo == "administrador" or $tipo == "empleado") {  ?>
        <li><a><i class="fa fa-database"></i> Productos<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="../producto/producto.php">Producto</a></li>
          </ul>
        </li>
      <?php } ?>



      <?php if ($tipo == "administrador" or $tipo == "empleado") { ?>
        <!-- <li><a href="../ventas_menbrecia/ventas_planes_lista.php"><i class="fa fa-retweet"></i>Registro Entrada de Membresia<span class="fa fa-chevron-right"></span></li></a> -->
      <?php } ?>

      <?php if ($tipo == "administrador") { ?>
        <!-- <li><a href="../graficos/ganancias_anio.php"><i class="fa fa-line-chart"></i>Ganancios del año<span class="fa fa-chevron-right"></span></li></a> -->
        <!-- <li><a href="../gastos/buscar_gastos_ingresos.php"><i class="fa fa-line-chart"></i>Informe gastos vs ingresos por mes<span class="fa fa-chevron-right"></span></li></a> -->
      <?php } ?>



      <?php if ($tipo == "administrador" or $tipo == "empleado") { ?>

        <li><a><i class="fa fa-bar-chart"></i> Reportes<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes/ventas_productos_por_mes.php">Venta de Productos</a></li>
            <li><a href="../reportes/gastos_por_mes.php">Gastos</a></li>
            <li><a href="../graficos/alumnos_por_profesor.php">Alumnos por Profe</a></li>

          </ul>
        </li>
      <?php } ?>

      <?php if ($tipo == "administrador") { ?>

        <!-- <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas Planes<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes_planes/reportes_por_fecha_planes.php">Entre fechas</a></li>
            <li><a href="../reportes_planes/reportes_por_dia_planes.php">Por dia</a></li>
            <li><a href="../reportes_planes/reportes_por_mes_planes.php">Por mes</a></li>
            <li><a href="../reportes_planes/reportes_ultimos_7dias_planes.php">Ultimos 7 dias</a></li>
          </ul>
        </li> -->

        <!-- <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas diario<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes_diario/reportes_por_fecha_diario.php">Entre fechas</a></li>
            <li><a href="../reportes_diario/reportes_por_dia_diario.php">Por dia</a></li>
            <li><a href="../reportes_diario/reportes_por_mes_diario.php">Por mes</a></li>
            <li><a href="../reportes_diario/reportes_ultimos_7dias_diario.php">Ultimos 7 dias</a></li>
          </ul>
        </li> -->


        <!-- <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas productos<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes/reportes_por_fecha.php">Entre fechas</a></li>
            <li><a href="../reportes/reportes_por_dia.php">Por dia</a></li>
            <li><a href="../reportes/reportes_por_mes.php">Por mes</a></li>
            <li><a href="../reportes/reportes_ultimos_7dias.php">Ultimos 7 dias</a></li>
          </ul>
        </li> -->
      <?php  } ?>

      <?php if ($tipo == "administrador") { ?>
        <li><a><i class="fa fa-bar-chart"></i>Sucursales<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="../sucursales/sucursales.php">Sucursales</a></li>

          </ul>
        </li>
      <?php  } ?>

      <li>
        <a><i class="fa fa-gear"></i>Configuracion<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="../usuario/editar_usuario_password.php">Cambiar Contraseña</a></li>
          <?php if ($tipo == "administrador") {  ?>
            <li><a href="../configuracion/configuracion.php">Mi Empresa</a></li>
          <?php } ?>
          <li><a href="../deportes/deportes.php">Disciplinas</a></li>
        </ul>
      </li>

      <?php if ($tipo == "administrador") { ?>

        <!-- <li><a><i class="fa fa-database"></i> Base de datos<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../otros/vaciar_bd.php" onClick="return confirm('¿Está seguro de que quieres vaciar la base de datos ??');">Vaciar base de datos</a></li>

            <li><a href="../otros/respaldo_add.php">Respaldo</a></li>

          </ul>
        </li> -->
      <?php } ?>

  </div>
</div>