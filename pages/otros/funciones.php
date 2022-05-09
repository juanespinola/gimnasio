<?php



function verificarActividad()
{
    session_start();
    include('../../dist/includes/dbcon.php');
    date_default_timezone_set('America/Asuncion');

    $query = "SELECT ac.fecha_asistencia, ac.id_actividad
        FROM asistencia_clientes ac 
        JOIN actividades a ON ac.id_actividad = a.id_actividad
        WHERE ac.fecha_asistencia < DATE_SUB(NOW(), INTERVAL 15 DAY)
        GROUP BY ac.fecha_asistencia, ac.id_actividad
        ORDER BY ac.fecha_asistencia DESC";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_row($result)) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }
}

verificarActividad();
