<?php


/**
 * Vamos a recibir los datos del input y vamos a guardarlo en la base de datos
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
$administrador = $data['administrador'];
$profesor = $data['profesor'];
$texto = $data['texto'];

$tabla = "conversaciones_" . $administrador . "_" . $profesor;

$sql = "SHOW TABLES LIKE '$tabla'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // La tabla no existe, se debe crear
    header("Location: ayuda.php?error=Hubo+un+error+no+existe+tabla");
    exit();

} else {
    //ACÁ LA TABLA YA EXISTE, VAMOS A RETORNAR TODOS LOS MENSAJES GUARDADOS EN EL CHAT, ABSOLUTAMENTE TODOS
    //$mensajes = array();
    date_default_timezone_set('America/Lima');    
    $fechaActual = date("Y-m-d");
    $horaActual = date("H:i:s"); 

    
    $consulta= "INSERT INTO conversaciones_" . $administrador . "_" . $profesor."(cod_administrador, cod_usuario, mensaje, hora_envio, fecha, estado, desde)
     VALUES ('$administrador', '$profesor', '$texto', '$horaActual', '$fechaActual', 'no visto', '$profesor')"; 
    mysqli_query($conn,$consulta);

    //Vamos a enviar la respuesta al cliente con el último mensaje de la fila
    //Pero antes vamos a determinar que id ocupa
    $res = mysqli_query($conn, 'SELECT MAX(id) AS max_id FROM  conversaciones_' . $administrador . '_' . $profesor);
    $resId = mysqli_fetch_assoc($res);

        $elemento = array('id' =>$resId['max_id'],'administrador' => $administrador, 'profesor' => $profesor, 'fecha' => $fechaActual, 'hora' => $horaActual, 'desde' => $profesor);
        
    
    $json = json_encode($elemento);
    header('Content-Type: application/json');
    echo $json;
}

?>
