<?php
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';

$parametro = $_POST['parametro'];
$codigo_alumno = $_POST['codigo-alumno'];							
$id_actividad = $_POST['id_actividad'];
$nota = $_POST['nota'];
$orden =  $_POST['orden'];
//Vamos a verficar si es que existe id_actividad
$sql_existe = "SELECT MAX(id_actividades_subidas_alumnos) as max_id FROM actividades_subidas_alumnos";
            $res = mysqli_query($connection, $sql_existe);
            
//Vamos a mostrar todos los ids de las tablas
$cslt = "SELECT id_actividades_subidas_alumnos FROM actividades_subidas_alumnos";
$r = mysqli_query($connection, $cslt);
while($c = mysqli_fetch_assoc($r)){
echo "ID : ".$c['id_actividades_subidas_alumnos']."<br>";
}

            if ($res && mysqli_num_rows($res) > 0) {
                $filaRes = mysqli_fetch_assoc($res);
                    
               echo $filaRes["max_id"];  

                $id = $filaRes["max_id"] + 1;
            } else {
                $id = 0;
            }

$consulta = "INSERT INTO actividades_subidas_alumnos (id_actividades_subidas_alumnos, orden_actividad_pertenencia, ruta_archivo, nota, procesado, dni_alumno, id_actividad)
VALUES ('$id', '$orden', 'ruta', '$nota', 'si', '$codigo_alumno', '$id_actividad')";



// Ejecutar la consulta
if (mysqli_query($connection,$consulta)) {
    // La fila se eliminó correctamente
    header("Location: ../../profesores-gestionar-actividad.php?codigo=".$parametro."&actividad=".$id_actividad);
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
    header("Location: ../../profesores-gestionar-actividad.php?codigo=".$parametro."&error=".urlencode($mensaje_error)."&actividad=".$id_actividad);
    exit();
}
?>