
<?php
// Recibir los datos enviados desde la solicitud Fetch
require_once '../../conexion_bd.php';

$valor = $_POST['numero'];
$codigo = $_POST['codigo'];
$consulta = "DELETE FROM temas WHERE id_tema = '$valor'";

// Ejecutar la consulta
if (mysqli_query($connection, $consulta)) {
    // La fila se eliminó correctamente
    header("Location: ../../profesores.php?codigo=".$codigo);
    exit();
} else {
    // Ocurrió un error al eliminar la fila
    $mensaje_error = "Hubo un error";
    header("Location: ../../profesores.php?codigo=".$codigo."&error=".urlencode($mensaje_error));
    exit();
}
?>
