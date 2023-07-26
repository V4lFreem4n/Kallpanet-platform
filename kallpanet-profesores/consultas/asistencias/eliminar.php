<?php
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';

$parametro = $_POST['cod_curso'];
$sesion = $_POST['id_sesion'];
 

$consulta = "DELETE FROM sesiones WHERE id_sesion = '$sesion'";

// Ejecutar la consulta
if (mysqli_query($connection, $consulta)) {
    // La fila se eliminó correctamente
    header("Location: ../../profesores-control-asistencia.php?codigo=".$parametro);
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
    header("Location: ../../profesores-control-asistencia.php?codigo=".$parametro."&error=".urlencode($mensaje_error));
    exit();
}
?>