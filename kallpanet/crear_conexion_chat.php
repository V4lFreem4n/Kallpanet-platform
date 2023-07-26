<?php

/**
 * Este php es accedido cada vez que se pulsa sobre un contacto
 * 
 * Definir desde afuere del php, $varible1 y $variable2
 * **/


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kallpanet_chat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//El $usuario1 será el administrador y $usuario2 el profesor
$data = json_decode(file_get_contents('php://input'), true);

// Acceder a los valores de variable1 y variable2
$variable1 = $data['variable1'];
$variable2 = $data['variable2'];

$tabla = "conversaciones_" . $variable1 . "_" . $variable2;

$sql = "SHOW TABLES LIKE '$tabla'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // La tabla no existe, se debe crear
    $sqlCrearTabla = "CREATE TABLE $tabla (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        cod_administrador VARCHAR(20) NOT NULL,
        cod_usuario VARCHAR(20) NOT NULL,
        mensaje VARCHAR(255),
        hora_envio TIME,
        fecha DATE,
        estado VARCHAR(20),
        desde VARCHAR(20)
    )";

    if (mysqli_query($conn, $sqlCrearTabla)) {
        //Vamos a retornar un array hacia el servidor...LA TABLA SE CREÓ EXITOSAMENTE

            

    } else {
        echo "Error al crear la tabla: " . $conn->error;
    }
} else {
    //ACÁ LA TABLA YA EXISTE, VAMOS A RETORNAR TODOS LOS MENSAJES GUARDADOS EN EL CHAT, ABSOLUTAMENTE TODOS
    $mensajes = array();
    $consulta= "SELECT * FROM conversaciones_" . $variable1 . "_" . $variable2;
    $resultado = mysqli_query($conn,$consulta);
    while($fila = mysqli_fetch_assoc($resultado)){
        $elemento = array('id' =>$fila['id'],'administrador' => $fila['cod_administrador'], 'profesor' => $fila['cod_usuario'],'mensaje' =>$fila['mensaje'], 'fecha' => $fila['fecha'], 'hora' => $fila['hora_envio'], 'estado' =>'no visto', 'desde' => $fila['desde']);
        array_push($mensajes, $elemento);
    }
    $json = json_encode($mensajes);
    header('Content-Type: application/json');
    echo $json;
}

?>