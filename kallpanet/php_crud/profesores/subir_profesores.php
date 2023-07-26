<?php
require_once '../../conexion_bd.php';
session_start();
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['profesor_dni']) && isset($_POST['profesor_nombre']) && isset($_POST['profesor_apellido']) && isset($_POST['profesor_usuario']) && isset($_POST['profesor_contrasena'])){
        $dni = trim($_POST['profesor_dni']);
        $nombre = trim($_POST['profesor_nombre']);
        $apellido = trim($_POST['profesor_apellido']);
        $usuario = trim($_POST['profesor_usuario']);
        $contrasena = trim($_POST['profesor_contrasena']);
        if ($dni == '' || $nombre == '' || $apellido == '' || $usuario == '' || $contrasena == '') {
            // Verificar si hay espacios en blanco en alguna variable
            $mensaje_error = "No ha rellenado todos los espacios";
            header("Location: ../../kallpanet-admin-profesores.php?error=" . urlencode($mensaje_error));
            exit();
        }
        
        $consulta = "INSERT INTO profesor (dni_profesor, nombre, apellido, usuario, contrasena)
        VALUES ('$dni', '$nombre', '$apellido', '$usuario', '$contrasena')";
        $existe = "SELECT COUNT(*) AS cantidad FROM profesor WHERE dni_profesor = '$dni'";
        $resul = mysqli_query($connection,$existe);
        $resultado = mysqli_fetch_assoc($resul);
        if($resultado['cantidad'] > 0){
            // YA EXISTE DNI EN LA TABLA 
            $mensaje_error = "El usuario ya existe en la base de datos";
            header("Location: ../../kallpanet-admin-profesores.php?error=".urlencode($mensaje_error));
            exit();
        }else{
            // NO EXISTE DNI EN LA TABLA   
            /* * AGREGAMOS ESTO AL HISTORIAL ** */
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "AGREGAR - PROFESOR";
$elementosAgregados = $dni;
$elementosEliminados = "NA";
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/******/
            
            mysqli_query($connection,$consulta);
            header("Location: ../../kallpanet-admin-profesores.php");
            exit();
        }
        

    }else{
        //DECIMOS QUE HAY INPUTS VACÍOS
        $mensaje_error = "Hubo un error, asegúrate de enviar los datos correctos.";
        header("Location: ../../kallpanet-admin-profesores.php?error=".urlencode($mensaje_error));
        exit();
    }

}
?>