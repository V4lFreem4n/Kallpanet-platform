<?php
require_once '../../conexion_bd.php';

$consulta_filas = "SELECT COUNT(*) AS num_filas FROM secciones";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nombre-seccion-subir']) && isset($_POST['nombre-grado-subir'])){
        //Ahora lo que vamos a hacer es insertar estos datos en la base de datos
        $nombreSeccion = $_POST['nombre-seccion-subir'];
        $nombreGrado = $_POST['nombre-grado-subir'];
        //vamos a hallar el cod_grado en funcion del nombreGrado
        $consulta_cod_grado = "SELECT cod_grado FROM grados WHERE nombre_grado='$nombreGrado';";
        $resultado_cod_grado = mysqli_query($connection, $consulta_cod_grado);
        if (mysqli_num_rows($resultado_cod_grado) > 0) {
            $fila_cod = mysqli_fetch_assoc($resultado_cod_grado);
            $cod_grado = $fila_cod['cod_grado'];
        } else {
            // No se encontró el grado, manejar el error o mostrar un mensaje adecuado al usuario
        }

        //Vamo a buscar si existen las secciones en un grado, vamos a buscar por nombre
        $query = "SELECT * FROM secciones WHERE nombre_seccion = '$nombreSeccion' AND cod_grado = '$cod_grado'";
        $data = mysqli_query($connection, $query);
        if(mysqli_num_rows($data)>0){
            $mensaje_error = "Ya existe una sección con el mismo nombre y en el mismo grado.";
            header("Location: ../../kallpanet-admin-secciones.php?error=".urlencode($mensaje_error));
            exit();
        }else{

        
            $cod_grado = $fila_cod['cod_grado'];

            $resultado_filas = mysqli_query($connection, $consulta_filas);
            $fila_filas = mysqli_fetch_assoc($resultado_filas);
            $consulta_mayor_id = "SELECT MAX(cod_seccion) AS maximo FROM secciones";
            $codSeccion = 0;
            $numFilas = $fila_filas['num_filas'];
            $consulta_agregar = "INSERT INTO secciones (cod_seccion, nombre_seccion, cod_grado) VALUES ('$codSeccion', '$nombreSeccion', '$cod_grado')";
            $consulta_existe = "SELECT * FROM grados WHERE nombre_grado='$nombreGrado'";
            if($numFilas == 0){ // Si no hay filas en la tabla
                mysqli_query($connection, $consulta_agregar);
                /* * AGREGAMOS ESTO AL HISTORIAL ** */
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "AGREGAR - SECCIÓN";
$elementosAgregados = $nombre_seccion."-".$nombreGrado;
$elementosEliminados = "NA";
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/******/
                header("Location: ../../kallpanet-admin-secciones.php");
                exit();
            } else {
                /* * AGREGAMOS ESTO AL HISTORIAL ** */
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "AGREGAR - SECCIÓN";
$elementosAgregados = $nombre_seccion."-".$nombreGrado;
$elementosEliminados = "NA";
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/******/
                    $resultado_maximo = mysqli_query($connection, $consulta_mayor_id);
                    $fila_maximo = mysqli_fetch_assoc($resultado_maximo);
                    $maximo = $fila_maximo['maximo'];
                    $codSeccion = $maximo + 1;
                    
                    $consulta_agregar_id = "INSERT INTO secciones (cod_seccion, nombre_seccion, cod_grado) VALUES ('$codSeccion', '$nombreSeccion', '$cod_grado')";
                    mysqli_query($connection, $consulta_agregar_id);
    
                    header("Location: ../../kallpanet-admin-secciones.php");
                    exit();
                
            }
        }

    }
}

?>