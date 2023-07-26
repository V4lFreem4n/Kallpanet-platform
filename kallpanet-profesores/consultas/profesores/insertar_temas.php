<?php
session_start();
require '../../conexion_bd.php';

// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_curso = $_POST['cod_curso'];
    
    // Verifica si se proporcionaron los campos necesarios
    if (isset($_POST['input-tema']) && isset($_POST['cod_curso'])) {
        $nombreTema = trim($_POST['input-tema']);
        
        if ($nombreTema == '') {
            // Verifica si el campo está vacío
            $mensaje_error = "No puede dejar vacío el input";
            header("Location: ../../profesores.php?codigo=".$cod_curso."&error=" . urlencode($mensaje_error));
            exit();
        } else {
            // Obtiene la fecha y hora actual
            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            // Consulta SQL para obtener el último ID de la tabla 'temas'
            $sql_existe = "SELECT MAX(id_tema) as max_id FROM temas";
            $res = mysqli_query($connection, $sql_existe);
            
            if ($res && mysqli_num_rows($res) > 0) {
                $filaRes = mysqli_fetch_assoc($res);
                $idTema = $filaRes["max_id"] + 1;
            } else {
                $idTema = 1;
            }

            // Consulta SQL para insertar el nuevo tema
            $consulta = "INSERT INTO temas (id_tema, nombre, fecha, hora, cod_curso)
                         VALUES ('$idTema', '$nombreTema', '$fecha', '$hora', '$cod_curso')"; 
            
            if (mysqli_query($connection, $consulta)) {
                header("Location: ../../profesores.php?codigo=".$cod_curso);
                exit();
            } else {
                $mensaje_error = "Error al insertar el tema en la base de datos";
                header("Location: ../../profesores.php?codigo=".$cod_curso."&error=" . urlencode($mensaje_error));
                exit();
            }
        }
    } else {
        $mensaje_error = "No ha rellenado todos los espacios";
        header("Location: ../../profesores.php?codigo=".$cod_curso."&error=" . urlencode($mensaje_error));
        exit();
    }
}
?>
