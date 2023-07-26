<?php
// Inicia la sesión


session_start();
require 'conexion_bd.php';


// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se proporcionaron los campos necesarios
    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
        $valorUsuario = $_POST['usuario'];
        $valorContrasena = $_POST['contrasena'];
        $valorUsuario = trim($valorUsuario);        // QUITAN LOS
        $valorContrasena = trim($valorContrasena);  // ESPACIOS DE LAS CADENAS

        echo "<script>alert('los datos son estos : ".$valorUsuario." ".$valorContrasena."')</script>";
        $consulta = "SELECT * FROM administrador WHERE usuario='$valorUsuario' AND contrasena='$valorContrasena';";
        $resultado = mysqli_query($connection,$consulta);
        if(mysqli_num_rows($resultado) === 1){
            $fila = mysqli_fetch_assoc($resultado);
            
            echo "<script>alert('los datos son estos : ".$fila['usuario']."')</script>";
            echo "<script>alert('los datos son estos : ".$fila['contrasena']."')</script>";
            if($fila['usuario'] == $valorUsuario && $fila['contrasena'] == $valorContrasena){
                $_SESSION['dni'] = $fila['dni_administrador'];
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['apellido'] = $fila['apellido'];
                $_SESSION['usuario'] = $fila['usuario'];
                $_SESSION['contrasena'] = $fila['contrasena'];
                $_SESSION['cod_institucion'] = $fila['cod_institucion'];
                
                header("Location: kallpanet-admin-grados.php");
                exit();
            }else{
                $mensaje_error = "Nombre de usuario o contraseña incorrectos";
                header("Location: login-admin.php?error=" . urlencode($mensaje_error));
                exit();
            }
        }else{
            $mensaje_error = "Nombre de usuario o contraseña incorrectos";
  header("Location: login-admin.php?error=" . urlencode($mensaje_error));
  exit();
        }
           
    }
}


?>
