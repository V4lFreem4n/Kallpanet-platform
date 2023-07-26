<?php
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "kallpanet_database"; // Nombre de la base de datos

// Crear una conexión
$connection = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($connection->connect_error) {
    die("Error al conectar a la base de datos: " . $connection->connect_error);
}

// Hacer consultas o realizar operaciones con la base de datos

// Cerrar la conexión
//$connection->close();
?>
