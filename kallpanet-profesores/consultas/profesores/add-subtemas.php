<?php
session_start();
require '../../conexion_bd.php';

// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_curso = $_POST['cod_curso'];
    
    // Verifica si se proporcionaron los campos necesarios
    if (isset($_POST['nombre']) && isset($_FILES['archivo'])) {


        

        $nombreSubTema = trim($_POST['nombre']);
        $idTema = $_POST['id_tema'];
        if ($nombreSubTema == '') {
            // Verifica si el campo está vacío
            $mensaje_error = "No puede dejar vacío el input";
            header("Location: ../../profesores.php?codigo=".$cod_curso."&error=" . urlencode($mensaje_error));
            exit();
        } else {
            // Obtiene la fecha y hora actual
            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            // Consulta SQL para obtener el último ID de la tabla 'temas'
            $sql_existe = "SELECT MAX(id_subtema) as max_id FROM subtema";
            $res = mysqli_query($connection, $sql_existe);
            
            if ($res && mysqli_num_rows($res) > 0) {
                $filaRes = mysqli_fetch_assoc($res);
                $idSubTema = $filaRes["max_id"] + 1;
            } else {
                $idSubTema = 1;
            }
             //============== SUBIR ARCHIVOS ==================//
            $rutaSubtemas = "archivos/subtema";
            $rutaActualphp = "../../archivos/subtema";
        $archivoNombre = $_FILES['archivo']['name'];
        $archivoTemporal = $_FILES['archivo']['tmp_name'];
        move_uploaded_file($archivoTemporal, $rutaActualphp . '/' .$idSubTema.'_'.$archivoNombre);
        $nombreRuta = $rutaSubtemas . '/' .$idSubTema.'_'.$archivoNombre;
            //============== SUBIR ARCHIVOS ==================//

            
            // Consulta SQL para insertar el nuevo tema
            $consulta = "INSERT INTO subtema (id_subtema, nombre, fecha, hora, ruta, id_tema)
                         VALUES ('$idSubTema', '$nombreSubTema', '$fecha', '$hora','$nombreRuta', '$idTema')"; 
            
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
