<?php
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';
session_start();
$nombreGrado = $_POST['nombre_grado_eliminar'];
$valorGrado = $_POST['valor_grado_eliminar'];
$valorSeccion = $_POST['valor_seccion_eliminar'];
$nombre_seccion = $valorSeccion; // Por defecto se pone el id de la sección
$resultado=mysqli_query($connection, "SELECT nombre_seccion FROM secciones WHERE cod_seccion = '$valorSeccion'");
if($resultado){
$fila = mysqli_fetch_assoc($resultado);
$nombre_seccion = $fila['nombre_seccion'];
}

$grado = $_POST['valor_grado'];
$consulta = "DELETE FROM secciones WHERE cod_seccion = '$valorSeccion'";

// Ejecutar la consulta
if (mysqli_query($connection, $consulta)) {
    // La fila se eliminó correctamente
    /* ** AGREGAMOS ESTO AL HISTORIAL *** */
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "ELIMINAR - SECCIÓN";
$elementosAgregados = "NA";
$elementosEliminados = $nombre_seccion."-".$nombreGrado;
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/**************/
    header("Location: ../../kallpanet-admin-secciones.php?select_grado=".urldecode($grado));
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
                header("Location: ../../kallpanet-admin-secciones.php?error=".urlencode($mensaje_error));
                exit();
}
?>
