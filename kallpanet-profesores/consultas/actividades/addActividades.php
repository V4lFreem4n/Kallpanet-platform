<?php
require '../../conexion_bd.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cod_curso = $_POST['cod_curso'];
  $cantidadFilas = count($_POST['fila_nombre']); //Vamos a crear el id manualmente
  
//Hacemos una consulta para saber el id máximo de la tabla silabo_actividad <----- ESTO ES PARA EL ID
$consulta_id_mayor = "SELECT MAX(id_silabo_actividad) AS max_id FROM silabo_actividad";
$respuesta = mysqli_query($connection, $consulta_id_mayor);
if(mysqli_num_rows($respuesta) > 0 && $respuesta){
  $row = mysqli_fetch_assoc($respuesta);
  $idMayor = $row['max_id'] + 1;
}else{
 $idMayor = 0; 
}
$contador = 0;  
  for ($i = 0; $i < $cantidadFilas; $i++) {
      $nombre = $_POST['fila_nombre_' . $i];
      $peso = $_POST['peso_' . $i];
      $consulta = "INSERT INTO silabo_actividad (id_silabo_actividad,orden_silabo_curso,nombre_actividad	,peso , estado_uso, cod_curso)
      VALUES ('$idMayor','$contador', '$nombre', '$peso', 'no', '$cod_curso')"; 
      mysqli_query($connection, $consulta); 

      $idMayor++;
      $contador++;
  }

  header("Location: ../../profesores-calificaciones.php?codigo=".$cod_curso);
  exit();
}
?>
