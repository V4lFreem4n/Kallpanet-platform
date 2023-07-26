<?php
session_start();
require '../../conexion_bd.php';

// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_curso = $_POST['cod_curso'];
    $id_tema = $_POST['id_tema'];
    // Verifica si se proporcionaron los campos necesarios
    if (isset($_POST['nombre-actividad']) && isset($_POST['fecha-inicio']) && isset($_POST['hora-inicio']) 
            && isset($_POST['minutos-inicio']) && isset($_POST['fecha-cierre'])  && isset($_POST['hora-cierre'])
            && isset($_POST['minutos-cierre']) && isset($_POST['descripcion']) && isset($_POST['actividad-silabo'])) {
                $nombreActividadTema = trim($_POST['nombre-actividad']);
                $fechaInicio = trim($_POST['fecha-inicio']);
                $horaInicio = trim($_POST['hora-inicio']);
                $minutosInicio = trim($_POST['minutos-inicio']);
                $fechaCierre = trim($_POST['fecha-cierre']);
                $horaCierre = trim($_POST['hora-cierre']);
                $minutosCierre = trim($_POST['minutos-cierre']);
                $descripcion = trim($_POST['descripcion']);
                $actividadSilabo = trim($_POST['actividad-silabo']);
                
        
        if ($nombreActividadTema == '' &&
        $fechaInicio == '' &&
        $horaInicio == '' &&
        $minutosInicio == '' &&
        $fechaCierre == '' &&
        $horaCierre == '' &&
        $minutosCierre == '' &&
        $descripcion == '' &&
        $actividadSilabo == '') {
            // Verifica si el campo está vacío
            $mensaje_error = "No puede dejar vacío el input";
            header("Location: ../../profesores-cursos.php?codigo=".$cod_curso."&error=" . urlencode($mensaje_error));
            exit(); 
        } else {
            //Voya unir las horas con los minutos
            $timeInicio = $horaInicio.":".$minutosInicio.":15";
            $timeCierre = $horaCierre.":".$minutosCierre.":15";
            // Obtiene la fecha y hora actual

            // Consulta SQL para obtener el último ID de la tabla 'temas'
            $sql_existe = "SELECT MAX(id_actividad) as max_id FROM actividad";
            $res = mysqli_query($connection, $sql_existe);
            
            if ($res && mysqli_num_rows($res) > 0) {
                $filaRes = mysqli_fetch_assoc($res);
                $idActividad = $filaRes["max_id"] + 1;
            } else {
                $idActividad = 0;
            }

            // Consulta SQL para insertar el nuevo tema
            $ruta = "ruta";
            $idActividad = $idActividad - 1;
            $consulta = "INSERT INTO actividad (id_actividad, nombre_actividad, fecha_activacion, hora_activacion, fecha_cierre, hora_cierre, ruta_archivo, descripcion, id_silabo_actividad, id_tema)
                         VALUES ('$actividadSilabo', '$nombreActividadTema', '$fechaInicio', '$timeInicio', '$fechaCierre', '$timeCierre','$ruta', '$descripcion', '$actividadSilabo', '$id_tema')"; 
            $query = "UPDATE silabo_actividad SET estado_uso = 'si' WHERE id_silabo_actividad = '$actividadSilabo'";
            
            if (mysqli_query($connection, $consulta)) {
                mysqli_query($connection, $query);
                header("Location: ../../profesores-cursos.php?codigo=".$cod_curso."&fechaCierre=".$fechaCierre);
                exit();
            } else {
                $mensaje_error = "Error al insertar el tema en la base de datos";
                header("Location: ../../profesores-cursos.php?codigo=".$cod_curso."&error=" . urlencode($mensaje_error));
            exit();
            }
        }
    } else {
        $mensaje_error = "No ha rellenado todos los espacios";
        header("Location: ../../profesores-cursos.php?codigo=".$cod_curso."&error=" . urlencode($mensaje_error));
            exit();
    }
}
?>
