<?php
$id = $_SESSION['id'];
?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">


    <ul class="nav side-menu">
      <li><a href="../layout/inicio.php"><i class="fa fa-dashboard"></i>Inicio<span class="fa fa-chevron-right"></span></a></li>
      <li><a href="../recordatorios/recordatorios.php"><i class="fa fa-dashboard"></i>Recordatorios<span class="fa fa-chevron-right"></span></a></li>
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


      <?php if ($tipo == "administrador") { ?>
        <li><a href="../planes/planes.php"><i class="fa fa-database"></i> Planes <span class="fa fa-chevron-right"></span></a></li>
      <?php } ?>

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
        <li><a><i class="fa fa-money"></i>Salarios<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
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


      <?php if ($tipo == "administrador") { ?>

        <li><a><i class="fa fa-bar-chart"></i> Reportes<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes/ventas_productos_por_mes.php">Venta de Productos</a></li>
            <li><a href="../reportes/gastos_por_mes.php">Gastos</a></li>
            <li><a href="../graficos/alumnos_por_profesor.php">Alumnos por Profe</a></li>

          </ul>
        </li>
      <?php } ?>



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
          <?php if ($tipo == "administrador") {  ?>
            <li><a href="../deportes/deportes.php">Disciplinas</a></li>
          <?php } ?>
        </ul>
      </li>

    </ul>
  </div>
</div>