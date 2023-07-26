<?php
session_start();
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';

if(isset($_POST['valor_eliminar'])){
    $valor = $_POST['valor_eliminar'];

$consulta = "DELETE FROM alumnos WHERE dni_alumno = '$valor'";

// Ejecutar la consulta
if (mysqli_query($connection, $consulta)) {
    // La fila se eliminó correctamente
    /* * AGREGAMOS ESTO AL HISTORIAL ** */
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "ELIMINAR - SECCIÓN";
$elementosAgregados = "NA";
$elementosEliminados = $valor;
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/******/
    header("Location: ../../kallpanet-admin-alumnos.php");
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
    header("Location: ../../kallpanet-admin-alumnos.php?error=".urlencode($mensaje_error));
    exit();
}
}
 

?>
