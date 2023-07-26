<?php
require_once '../../conexion_bd.php';
session_start();

$cantidadAlumnosSubidos = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_FILES["archivo_csv"]) && $_FILES["archivo_csv"]["error"] == 0 && isset($_POST["cod-seccion"])) {

    $cod_seccion = $_POST["cod-seccion"];

    $ruta_temporal = $_FILES["archivo_csv"]["tmp_name"];
    
    // Realizar operaciones con el contenido del archivo CSV
    $contenido_csv = file_get_contents($ruta_temporal);
    $contenido_csv = rtrim($contenido_csv);
    $filas = explode("\n", $contenido_csv);
    
    $consulta = "INSERT IGNORE INTO alumnos (dni_alumno, nombre, apellido, usuario, contrasena, cod_seccion) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $consulta);
    mysqli_stmt_bind_param($stmt, 'ssssss', $dni, $nombre, $apellido, $usuario, $contrasena, $cod_seccion);
    
    foreach ($filas as $fila) {
      // Realizar operaciones con cada fila
      $datos = explode(";", $fila); // Suponiendo que las columnas están separadas por comas
      
      $dni = $datos[0];
      $nombre = $datos[1];
      $apellido = $datos[2];
      $usuario = $datos[3];
      $contrasena = $datos[4];
      
      // Ejecutar la consulta preparada
      if (mysqli_stmt_execute($stmt)) {
        // Continuar con el bucle
        $cantidadAlumnosSubidos++;
        continue;
      } else {
        $mensaje_error = "Error al cargar el archivo CSV.";
        header("Location: ../../kallpanet-admin-alumnos.php?error=".urlencode($mensaje_error));
        exit();
      }
    }
    /* * AGREGAMOS ESTO AL HISTORIAL ** */
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "ELIMINAR - SECCIÓN";
$elementosAgregados = $cantidadAlumnosSubidos ;
$elementosEliminados = $nombre_seccion;
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/******/
    // Redireccionar después de procesar todas las filas
    header("Location: ../../kallpanet-admin-alumnos.php");
    exit();
    
    mysqli_stmt_close($stmt);
  } else {
    $mensaje_error = "Error al cargar el archivo CSV.";
    header("Location: ../../kallpanet-admin-alumnos.php?error=".urlencode($mensaje_error));
    exit();
  }
}
?>
