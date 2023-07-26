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

       
        $consulta = "SELECT * FROM profesor WHERE usuario='$valorUsuario' AND contrasena='$valorContrasena';";
        $resultado = mysqli_query($connection,$consulta);
        if(mysqli_num_rows($resultado) === 1){
            $fila = mysqli_fetch_assoc($resultado);
            
            if($fila['usuario'] == $valorUsuario && $fila['contrasena'] == $valorContrasena){
                $_SESSION['dni_profesor'] = $fila['dni_profesor'];
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['apellido'] = $fila['apellido'];
                $_SESSION['usuario'] = $fila['usuario'];
                $_SESSION['contrasena'] = $fila['contrasena'];
                
                
                header("Location: profesores-admin.php");
                exit();
            }else{
                $mensaje_error = "Nombre de usuario o contraseña incorrectos";
                header("Location: login.php?error=" . urlencode($mensaje_error));
                exit();
            }
        }else{
            $mensaje_error = "Nombre de usuario o contraseña incorrectos";
  header("Location: login.php?error=" . urlencode($mensaje_error));
  exit();
        }
           
    }
}

?>
