<?php
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';

$parametro = $_POST['parametro'];
$id_actividad = $_POST['actividad-eliminar'];

$query_actualizar = "UPDATE silabo_actividad SET estado_uso = 'no' WHERE id_silabo_actividad = '$id_actividad';";
mysqli_query($connection,$query_actualizar);

$consulta = "DELETE FROM actividad WHERE id_actividad = '$id_actividad'";

// Ejecutar la consulta
if (mysqli_query($connection, $consulta)) {
    // La fila se eliminó correctamente
    header("Location: ../../profesores-cursos.php?codigo=".$parametro);
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
    header("Location: ../../profesores.php?codigo=".$parametro."&error=".urlencode($mensaje_error));
    exit();
}
?>