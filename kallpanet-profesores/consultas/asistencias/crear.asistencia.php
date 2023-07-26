<?php
require '../../conexion_bd.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //VAMOS A COMPROBAR SI EXISTE EL NOMBRE DE LA SESIÓN EN LA BASE DE DATOS
  $nombre_sesion = $_POST['name_sesion']; 
  $cod_curso = $_POST['cod_curso'];

  $consulta_existe = "SELECT * FROM sesiones WHERE nombre_sesion = '$nombre_sesion'";
  $resultado_existe = mysqli_query($connection, $consulta_existe);
  if($resultado_existe && mysqli_num_rows($resultado_existe)>0){
    //Si sucede esto es que ya existe una sesion con este nombre
    $mensaje_error = "Ya se repite el nombre de la sesión";
    $mensaje_error = urlencode($mensaje_error);
    header("Location: ../../profesores-control-asistencia.php?codigo=".$cod_curso."&error=".$mensaje_error);
  exit();
  }

//Hacemos una consulta para saber el id máximo de la tabla asistencia <----- ESTO ES PARA EL ID
/*
$consulta_id_mayor = "SELECT MAX(id_asistencia) AS max_id FROM asistencia";
$respuesta = mysqli_query($connection, $consulta_id_mayor);
if(mysqli_num_rows($respuesta) > 0 && $respuesta){
  $row = mysqli_fetch_assoc($respuesta);
  $idMayor = $row['max_id'] + 1;
}else{
 $idMayor = 0; 
}
 */
//Vamos a insertar el dato
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$consulta = "INSERT INTO sesiones (nombre_sesion, fecha, cod_curso) VALUES ('$nombre_sesion', '$fechaActual','$cod_curso')";

if(mysqli_query($connection, $consulta)){
    header("Location: ../../profesores-control-asistencia.php?codigo=".$cod_curso);
  exit();
}
  
}
?>
