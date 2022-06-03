<?php

if ($_POST['id_cliente']) {
    obtenerDatos($_POST['id_cliente']);
}


function obtenerDatos($id_cliente)
{
    include('../../dist/includes/dbcon.php');
    date_default_timezone_set('America/Asuncion');
    $fecha_actual = date("Y-m-d");
    // $fecha_actual = '2022-07-28';
    $hora_actual = date('H:i:s');
    // $hora_actual = '19:00:00';
    $query = mysqli_query($con, "SELECT 
        concat(c.nombre, ' ', c.apellido) as nombre_completo,
        c.dni as cedula,
        DATE_FORMAT(cu.fecha_fin, '%d-%m-%Y') as vto_cuota,
        concat(p.nombre, ' ', p.apellido) as profesor,
        ac.fecha_asistencia as ultima_asistencia,
        d.descripcion as clase,
        concat(a.horario_inicio, ' - ', a.horario_final) as horario,
        c.telefono as telefono,
        a.id_actividad as id_actividad
        FROM clientes c 
        JOIN actividades a ON c.id_cliente = a.id_cliente
        LEFT JOIN cuotas cu ON a.id_actividad = cu.id_actividad
        JOIN profesores p ON a.id_profesor = p.id_profesor
        JOIN deportes d ON a.id_deporte = d.id_deporte
        LEFT JOIN asistencia_clientes ac ON a.id_actividad = ac.id_actividad
        WHERE c.dni LIKE '%$id_cliente%' AND a.horario_inicio <= '$hora_actual' AND a.horario_final > '$hora_actual'
        ORDER BY vto_cuota DESC
        LIMIT 1");
    $data;
    $vto_cuota;
    $id_actividad;
    while ($row = mysqli_fetch_array($query)) {
        $data = $row;
        $vto_cuota = $row['vto_cuota'];
        $id_actividad = $row['id_actividad'];
    }

    // diferencia de dias
    $fecha_1 = new DateTime($fecha_actual);
    $fecha_2 = new DateTime($vto_cuota);
    $diferencia = $fecha_1->diff($fecha_2);

    $dias_restantes = ($diferencia->invert == 1) ? $diferencia->days : (-$diferencia->days);
    if ($id_actividad) {

        if ($dias_restantes > 0) {
            $respuesta = 'El Cliente esta atrasado en su cuota por ' . $dias_restantes . ' dias';
        } else {

            $asistencias = mysqli_query($con, "SELECT * FROM asistencia_clientes WHERE id_actividad = '$id_actividad' AND fecha_asistencia BETWEEN '$fecha_actual 06:00:00' AND '$fecha_actual 21:59:59'") or die(mysqli_error($con));
            $asistencia = mysqli_fetch_array($asistencias);

            if (!$asistencia) {
                $sql = "INSERT INTO `asistencia_clientes` (`fecha_asistencia`,`id_actividad`)
            VALUES
            (
                '" . date("Y-m-d H:i:s") . "',
                '" . $id_actividad . "'
            );";
                mysqli_query($con, $sql) or die(mysqli_error($con));
            } else {
                $respuesta = 'El Cliente ya ingreso su asistencia';
            }
        }
    } else {
        $respuesta = 'El Cliente no tiene actividades en este horario ' . $hora_actual . '';
    }

    $json = array('data' => $data, 'mensaje' => $respuesta);
    print(json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
    exit();
}
