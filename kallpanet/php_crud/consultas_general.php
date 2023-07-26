<?php
require_once '../conexion_bd.php';


// Función para ejecutar consultas
function consultas($consulta, $callback) {
    global $connection;
    
    // Ejecutar la consulta
    $resultado = mysqli_query($connection, $consulta);
    
    // Verificar si se obtuvieron resultados y pasarlos a la función de devolución de llamada
    if (mysqli_num_rows($resultado) > 0) {
        $callback($resultado);
    } else {
        $callback(false);
    }
}
?>