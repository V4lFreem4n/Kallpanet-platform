<?php
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';
session_start();
$valor = $_POST['valor-eliminar'];
$nombreSeccion = $_POST['nombre_seccion'];
$nombreGrado = $_POST['nombre_grado'];
$nombreCurso = $_POST['nombre_curso'];
$consulta = "DELETE FROM cursos WHERE cod_curso = '$valor'";

// Ejecutar la consulta
if (mysqli_query($connection, $consulta)) {
    // La fila se eliminó correctamente

  /* * AGREGAMOS ESTO AL HISTORIAL ** */
  date_default_timezone_set('America/Lima');    
  $fechaActual = date("Y-m-d");
  $horaActual = date("H:i:s"); 
  $accion = "ELIMINAR - CURSO";
  $elementosAgregados = "NA";
  $elementosEliminados = $nombreCurso. "-".$nombreSeccion."-".$nombreGrado;
  $dni_administrador = $_SESSION['dni'];
  mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
   VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
  /******/

    header("Location: ../../kallpanet-admin-cursos-modificar.php");
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
    header("Location: ../../kallpanet-admin-cursos-modificar.php?error=".urlencode($mensaje_error));
    exit();
}
?>