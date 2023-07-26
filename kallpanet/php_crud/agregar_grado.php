<?php
require_once '../conexion_bd.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['input-grado'])){
        $grado = $_POST['input-grado'];
        $grado = trim($grado);

        //Vamos a comprobar si existe un grado con ese nombre primero
        $comprobar_grado = "SELECT * FROM grados WHERE nombre_grado='$grado'";
        $respuesta_nombre_ya_existe = mysqli_query($connection, $comprobar_grado);
        if(mysqli_num_rows($respuesta_nombre_ya_existe) > 0){
            $mensaje_se_repite_nombre = "El grado ya existe en la base de datos";
            header("Location: ../kallpanet-admin-grados.php?error=".urldecode($mensaje_se_repite_nombre));
            exit();
        }

        $idInstitucion = $_SESSION['cod_institucion'];
        //Ahora vamos a comprobar el máximo id de la tabla
        //echo "se llegó acá 0 ||";
        $query_maximo = "SELECT MAX(cod_grado) AS id_max FROM grados";
        $respuesta_id_maximo = mysqli_query($connection, $query_maximo);

        //echo "se llegó acá 1 ||";
        if($respuesta_id_maximo && mysqli_num_rows($respuesta_id_maximo)){
            $filas = mysqli_fetch_assoc($respuesta_id_maximo);
            $cod_curso_maximo = $filas['id_max'] + 1;
            //echo "se llegó acá 2 ||";
        }else{
            $cod_curso_maximo = 0;
            //echo "se llegó acá 3 ||";
        }

        //Ahora vamos a ingresar los datos en la tabla grados
        $consulta = "INSERT INTO grados (cod_grado, nombre_grado, cod_institucion) VALUES ('$cod_curso_maximo', '$grado', '$idInstitucion')";
        //echo "se llegó acá 4 ||";
        if(mysqli_query($connection, $consulta)){

            /* ***** AGREGAMOS ESTO AL HISTORIAL **** */
            date_default_timezone_set('America/Lima');  
            $fechaActual = date("Y-m-d");
            $horaActual = date("H:i:s"); 
            $accion = "AGREGAR - GRADOS";
            $elementosAgregados = $grado;
            $elementosEliminados = "NA";
            $dni_administrador = $_SESSION['dni'];
            mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
             VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
            /******************************************/
            header("Location: ../kallpanet-admin-grados.php");
            exit();
        }else{
            header("Location: ../kallpanet-admin-grados.php?error=hubo+un+error");
            exit();
        }

}else{
    header("Location: ../kallpanet-admin-grados.php?error=hubo+un+error+en+el+input");
    exit();
}
}
?>
