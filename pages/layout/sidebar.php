<?php
$id = $_SESSION['id'];
?>

<?php

?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <!-- <h3><?php echo $empresa; ?></h3> -->

    <ul class="nav side-menu">
      <li><a href="../layout/inicio.php"><i class="fa fa-dashboard"></i> inicio <span class="fa fa-chevron-right"></span></a></li>

      <?php if ($tipo == "administrador" or $tipo == "empleado") {  ?>

        <li><a><i class="fa fa-money"></i> Ventas<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="../ventas/agregar_venta.php">Ventas productos</a></li>
            <li><a href="../ventas_old/pos.php">Ventas productos</a></li>
            <!-- <li><a href="../ventas_menbrecia/pos.php">Venta planes /membresias</a></li>-->
            <!--<li><a href="../venta_dia/venta_diaria.php">Venta diaria</a></li> -->
          </ul>
        </li>

      <?php } ?>
      <li><a href="../planes/planes.php"><i class="fa fa-database"></i> Planes <span class="fa fa-chevron-right"></span></a></li>
      <li><a href="../layout/caja.php"><i class="fa fa-bank"></i> Caja <span class="fa fa-chevron-right"></span></a></li>
      <!-- <li><a href="https://ventadecodigofuente.com" target="_blank"><i class="fa fa-cart-plus"></i> Compre mas sistemas aqui <span class="fa fa-chevron-right"></span></a></li> -->

      <!-- <li><a href="https://www.youtube.com/c/tusolutionwebTutos" target="_blank"><i class="fa fa-television"></i> Canal de yotube <span class="fa fa-chevron-right"></span></a></li> -->

      <li><a href="../gastos/gastos.php"><i class="fa fa-bank"></i> Gastos <span class="fa fa-chevron-right"></span></a></li>
      <?php
      if ($tipo == "administrador") {

      ?>
        <li><a><i class="fa fa-group"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../usuario/usuario.php">Usuarios</a></li>

            <li><a href="../usuario/usuario_agregar.php">Agregar</a></li>

          </ul>
        </li>

        <li><a><i class="fa fa-money"></i>Salarios<span class="fa fa-chevron-right"></span></a>
          <ul class="nav child_menu">
            <li><a href="../asignar_sueldo/asignar_sueldo.php">Empleados</a></li>
            <li><a href="../salarios/salario_profesores.php">Profesores</a></li>
          </ul>

        </li>


      <?php
      }
      ?>
      <li><a><i class="fa fa-user-md"></i> Personas<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">

          <li><a href="../cliente/cliente.php">Lista de Alumnos</a></li>
          <li><a href="../profesores/profesores.php">Lista de Profesores</a></li>
          <!-- <li><a href="../deporte_profesor/deportes_profesores.php">Agregar</a></li> -->
          <li><a href="../actividades/actividades.php">Actividades</a></li>
          <li><a href="../alumnos_profesor/alumnos_profesor.php">Alumnos por Profesor</a></li>
          <li><a href="../alumnos_deporte/alumnos_deporte.php">Alumnos por Disciplinas</a></li>
        </ul>
      </li>



      <?php
      if ($tipo == "administrador" or $tipo == "empleado") {

      ?>
        <li><a><i class="fa fa-database"></i> Productos<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../producto/producto.php">Producto</a></li>



          </ul>
        </li>

      <?php
      }
      ?>



      <?php
      if ($tipo == "administrador" or $tipo == "empleado") {

      ?>




        <li><a href="../ventas_menbrecia/ventas_planes_lista.php"><i class="fa fa-retweet"></i>Registro Entrada de Membresia<span class="fa fa-chevron-right"></span></li></a>


      <?php
      }
      if ($tipo == "administrador") {

      ?>
        <li><a href="../graficos/ganancias_anio.php"><i class="fa fa-line-chart"></i>Ganancios del año<span class="fa fa-chevron-right"></span></li></a>
        <!-- <li><a href="../gastos/buscar_gastos_ingresos.php"><i class="fa fa-line-chart"></i>Informe gastos vs ingresos por mes<span class="fa fa-chevron-right"></span></li></a> -->
      <?php } ?>



      <?php
      if ($tipo == "administrador" or $tipo == "empleado") {

      ?>
        <li><a><i class="fa fa-bar-chart"></i> Ventas realizadas<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../ventas_menbrecia/ventas_planes_totales.php">Planes</a></li>
            <li><a href="../venta_dia/ventas_diario_totales.php">Por dia</a></li>
            <li><a href="../ventas/ventas_productos_totales.php">Productos</a></li>

          </ul>
        </li>
      <?php
      }

      if ($tipo == "administrador") {
      ?>

        <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas Planes<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes_planes/reportes_por_fecha_planes.php">Entre fechas</a></li>
            <li><a href="../reportes_planes/reportes_por_dia_planes.php">Por dia</a></li>
            <li><a href="../reportes_planes/reportes_por_mes_planes.php">Por mes</a></li>
            <li><a href="../reportes_planes/reportes_ultimos_7dias_planes.php">Ultimos 7 dias</a></li>
          </ul>
        </li>

        <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas diario<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes_diario/reportes_por_fecha_diario.php">Entre fechas</a></li>
            <li><a href="../reportes_diario/reportes_por_dia_diario.php">Por dia</a></li>
            <li><a href="../reportes_diario/reportes_por_mes_diario.php">Por mes</a></li>
            <li><a href="../reportes_diario/reportes_ultimos_7dias_diario.php">Ultimos 7 dias</a></li>
          </ul>
        </li>


        <li><a><i class="fa fa-bar-chart"></i> Reportes Ventas productos<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../reportes/reportes_por_fecha.php">Entre fechas</a></li>
            <li><a href="../reportes/reportes_por_dia.php">Por dia</a></li>
            <li><a href="../reportes/reportes_por_mes.php">Por mes</a></li>
            <li><a href="../reportes/reportes_ultimos_7dias.php">Ultimos 7 dias</a></li>
          </ul>
        </li>
      <?php
      }
      ?>

      <li><a><i class="fa fa-gear"></i>Configuracion<span class="fa fa-chevron-s"></span></a>
        <ul class="nav child_menu">


          <li><a href="../usuario/editar_usuario_password.php">Cambiar Contraseña</a></li>
          <?php
          if ($tipo == "administrador") {

          ?>
            <li><a href="../configuracion/configuracion.php">Mi Empresa</a></li>
          <?php
          }
          ?>
          <li><a href="../tipos_clientes/tipos_clientes.php">Tipos de Cliente</a></li>
          <li><a href="../deportes/deportes.php">Disciplinas</a></li>




        </ul>
      </li>




      <?php
      if ($tipo == "administrador") {

      ?>
        <!-- 
        <li><a><i class="fa fa-database"></i> Base de datos<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">

            <li><a href="../otros/vaciar_bd.php" onClick="return confirm('¿Está seguro de que quieres vaciar la base de datos ??');">Vaciar base de datos</a></li>

            <li><a href="../otros/respaldo_add.php">Respaldo</a></li>

          </ul>
        </li> -->
      <?php
      }
      ?>

  </div>
  <!--- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>--->

</div>