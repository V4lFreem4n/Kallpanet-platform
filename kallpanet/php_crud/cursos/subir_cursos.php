<?php
require_once '../../conexion_bd.php';
session_start();
$curso = $_POST['nombreCurso'];
$grado = $_POST['grados'];
$secciones = $_POST['secciones'];
$profesor = $_POST['profesor'];
$nombreSeccion = $_POST['nombre_seccion'];
$nombreGrado = $_POST['nombre_grado'];

// Verificar si existen registros en la tabla cursos
$query = "SELECT COUNT(*) AS num_cursos FROM cursos";
$resultado = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($resultado);
$numCursos = $row['num_cursos'];

// Determinar el valor para el campo cod_curso
if ($numCursos == 0) {
    $codCurso = 0; // No hay registros, asignar 0
} else {
    // Obtener el máximo cod_curso y sumarle 1
    $query = "SELECT MAX(cod_curso) AS max_cod_curso FROM cursos";
    $resultado = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($resultado);
    $maxCodCurso = $row['max_cod_curso'];
    $codCurso = $maxCodCurso + 1;
}

// Realizar la consulta de inserción
$query = "INSERT INTO cursos (cod_curso, nombre, area, dni_profesor, cod_seccion)
          VALUES ('$codCurso', '$curso', '', '$profesor', '$secciones')";

// Ejecutar la consulta
$resultado = mysqli_query($connection, $query);

// Verificar si la consulta tuvo éxito
if ($resultado) {

    /* * AGREGAMOS ESTO AL HISTORIAL ** */
date_default_timezone_set('America/Lima');    
$fechaActual = date("Y-m-d");
$horaActual = date("H:i:s"); 
$accion = "AGREGAR - CURSO";
$elementosAgregados = $curso. "-".$nombreSeccion."-".$nombreGrado;
$elementosEliminados = "NA";
$dni_administrador = $_SESSION['dni'];
mysqli_query($connection, "INSERT INTO historial (fecha, hora, accion, elementos_agregados, elementos_eliminados, dni_administrador)
 VALUES ('$fechaActual','$horaActual', '$accion','$elementosAgregados', '$elementosEliminados', '$dni_administrador')");
/******/

    // La inserción se realizó correctamente
    header("Location: ../../kallpanet-admin-cursos-modificar.php");
            exit();
} else {
    // Manejar el caso de error en la consulta
    header("Location: ../../kallpanet-admin-cursos-modificar.php");
            exit();
}
?>
