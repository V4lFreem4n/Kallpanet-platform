<?php
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';
session_start();
$valor = $_POST['valor_eliminar'];

$consulta = "DELETE FROM grados WHERE nombre_grado = '$valor'";


/* ** AGREGAMOS ESTO AL HISTORIAL *** */
date_default_timezone_set('America/Lima');  
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "ELIMINAR - GRADOS";
$elementosAgregados = "NA";
$elementosEliminados = $valor;
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/**************/
// Ejecutar la consulta
if (mysqli_query($connection, $consulta)) {
    // La fila se eliminó correctamente
    

    header("Location: ../../kallpanet-admin-grados.php");
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
    header("Location: ../../kallpanet-admin-grados.php?error=".urlencode($mensaje_error));
    exit();
}
?>