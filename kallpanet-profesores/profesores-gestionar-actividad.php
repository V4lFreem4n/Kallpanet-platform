<!DOCTYPE html>
<html>
<head>
  <title>Título de la página</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Pacifico&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/loginKallpanet_vcf.css">
  
</head>
<body>

<?php
session_start();
?>
<?php
 
 if (isset($_GET['codigo'])) {

     require_once 'conexion_bd.php';
     $id_actividad = $_GET['actividad']; //NO TE OLVIDES DE VALIDAR EL ID DE LA ACTIVIDAD
     $parametro = $_GET['codigo'];
    //Vamos a comprobar que el cod_curso le pertenezca al profesor
    $codProfesor = $_SESSION['dni_profesor'];
    $consulta = "SELECT * FROM cursos WHERE cod_curso='$parametro' AND dni_profesor='$codProfesor'"; 
    $resultado = mysqli_query($connection, $consulta);
    //Comprobamos, si está vacío, es que se accede a un curso que no le pertece al profe, si es que no, se procede normal
    if(mysqli_num_rows($resultado) > 0){ //Hay resultados
     //VAMOS A EXTRAER EL ORDEN LA ACTIVIDAD
     $respuesta_orden = mysqli_query($connection,"SELECT orden_silabo_curso FROM silabo_actividad WHERE id_silabo_actividad='$id_actividad'");
     if(mysqli_num_rows($resultado) > 0){
       $orden_resp = mysqli_fetch_assoc($respuesta_orden);
       $orden_actividad = $orden_resp['orden_silabo_curso'];
     }else{
      header("Location: 404.php");
     exit();
     }
    }else{
     header("Location: 404.php");
     exit();
    }
 } else {
     header("Location: profesores-admin.php");
     exit();
 }
 ?>

    <div class="contenedor">
    <div class="panel-arriba" style="padding: 5px;display:flex">
   <div><img src="images/logo_kallpanet.png" style="width: 150px;margin-top:-10px;opacity:.5"></div>
    <div style="margin-left:auto; display:flex">
    <div class="datos-profesor">
    <?php
   echo "<h4>".$_SESSION['nombre']." ".$_SESSION['apellido']."</h4>";
   echo "<h6>Cod. Prof. <strong>".$_SESSION['dni_profesor']."</strong></h6>";
    ?>
    </div>
    <div class="imagen-profesor" style="border-radius: 50%;">
        <img src="images/profesor.png" style="width: 60px;">
    </div></div>
   </div>
      <div class="panel-abajo">
      <div class="panel-izquierda">
      <div class="btn-1" id="btn-1" style="display: flex;">
        <img src="images/libros.png" style="height: 40px;width:40px; margin-right:5px">
        <h3>CURSOS</h3>
      </div>
      <div class="btn-2" id="btn-2" style="display: flex;">
      <img src="images/hablar.png" style="height: 40px;width:40px; margin-right:5px">
      <h3>AYUDA</h3>
      </div> 
      <div class="btn-salir" id="salir">
        <h3>SALIR</h3>
      </div>

    </div>
        
          <div class="menu-lateral" style="padding: 10px;">
            <p id="p1">Vista general</p>
            <p id="p2" style="text-decoration: underline;">Asignar actividad</p>
            <p id="p3">Control de asistencia</p>
            <p id="p4">Calificaciones</p>
          </div>

          <div class="contenido">
            <div>
            <?php
            require_once 'conexion_bd.php';
            $con = "SELECT * FROM cursos WHERE cod_curso='$parametro'";
            $resp = mysqli_query($connection, $con);
    //Comprobamos, si está vacío, es que se accede a un curso que no le pertece al profe, si es que no, se procede normal
    if(mysqli_num_rows($resp) > 0){ //Hay resultados
            while($row = mysqli_fetch_assoc($resp)){
              echo '<h1>'.$row['nombre'].'</h1>';
            }
    }


    $dni_profesor = $_SESSION['dni_profesor'];
    $query = "SELECT p.*,c.nombre AS nombre_curso, c.cod_curso, s.nombre_seccion, s.cod_seccion, g.nombre_grado  FROM profesor as p INNER JOIN cursos as c ON p.dni_profesor = c.dni_profesor
      INNER JOIN secciones AS s ON c.cod_seccion = s.cod_seccion INNER JOIN grados AS g ON s.cod_grado = g.cod_grado WHERE p.dni_profesor = '$dni_profesor' AND c.cod_curso = '$parametro'";
$res = mysqli_query($connection,$query);
if(mysqli_num_rows($res) > 0){
  while($row = mysqli_fetch_assoc($res)){
    echo'<div style="display:flex;"><p style="color:blue;margin-right:5px;font-size: 14px;">'.$row['nombre_seccion'].'</p> <p style="color:green;font-size: 14px;">'.$row['nombre_grado'].'</p></div>';
  }
}
            ?>
            <h4>Gestionar Actividad</h4>

            <?php
            require_once 'conexion_bd.php';
            $consul = "SELECT a.*, sa.nombre_actividad as nombre_actividad_silabo FROM actividad AS a  
            INNER JOIN silabo_actividad  AS sa ON a.id_silabo_actividad = sa.id_silabo_actividad WHERE id_actividad='$id_actividad'";
            $res = mysqli_query($connection, $consul);
    //Comprobamos, si está vacío, es que se accede a un curso que no le pertece al profe, si es que no, se procede normal
    if(mysqli_num_rows($res) > 0){ //Hay resultados
            while($row = mysqli_fetch_assoc($res)){
              echo '<p style="font-style: italic;">'.$row['nombre_actividad'].'</p>';
              echo '<p style="font-style: italic;">'.$row['nombre_actividad_silabo'].'</p>';
            }
    }
            ?>

            </div>
            <div>
            <table class="table" id="tabla">
  
                <thead class="table-warning">
                    <tr>
                    <th scope="col">Cod. Doc.</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDO</th>
                    <th scope="col">ARCHIVO(S) SUBIDOS</th>
                    <th scope="col">CALIFICAR</th>
                    <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consulta = "SELECT alumnos.*
                    FROM alumnos
                    INNER JOIN secciones ON alumnos.cod_seccion = secciones.cod_seccion
                    INNER JOIN cursos ON secciones.cod_seccion = cursos.cod_seccion
                    WHERE cursos.cod_curso = '$parametro';
                    ";
                    $resultado = mysqli_query($connection, $consulta);
                    if(mysqli_num_rows($resultado) > 0){ //Existe existe sílabo mostramos las tablas de alumnos p
                      $contador = 0;
                    while($row = mysqli_fetch_assoc($resultado)){
                     $calu =$row['dni_alumno'];
                    echo '<tr>';  
                    echo '<form action="consultas/alumnos_evaluaciones/notas.php" method="POST" id="form-notas">';
                    echo '<td scope="col">'.$calu.'</td>';
                    echo '<td scope="col">'.$row['nombre'].'</td>';
                    echo '<td scope="col">'.$row['apellido'].'</td>';
                
                    echo '<td><a href="#">archivo subido</a></td>
                    <td><select id="decimal_'.$contador.'" name="nota"></select><select></select></td>
                    <td>
                    <input type="hidden" value="'.$orden_actividad.'" name="orden">
                    <input type="hidden" value="'.$parametro.'" name="parametro">
                    <input type="hidden" value="'.$id_actividad.'" name="id_actividad">
                    
                    <input type="hidden" id="cod_alumno_'.$contador.'" value="'.$row['dni_alumno'].'" name="codigo-alumno"">      
                    ';
                    $que = "SELECT * FROM actividades_subidas_alumnos WHERE procesado='si' AND dni_alumno='$calu' AND id_actividad='$id_actividad'"; 
                    $re = mysqli_query($connection, $que);
    //Comprobamos, si está vacío, es que se accede a un curso que no le pertece al profe, si es que no, se procede normal
    if(mysqli_num_rows($re) > 0){
      while($fi = mysqli_fetch_assoc($re)){
        echo '<button type="button" class="btn btn-light"><img id="img_'.$contador.'" src="images/garrapata.png" width="25px""></button>';
      }
    }else{
      echo '<button type="submit" onclick="procesar('.$contador.')" class="btn btn-info"><img id="imagen_'.$contador.'" src="images/proceso.png" width="25px""></button>';
        
    }
                    echo '
                    </td>
                    </form>
                    </tr>
                    ';
                    $contador++;
                    }
                    
                  }
                    ?>
                    </tbody>
                </table>
            </div>    
          </div>
        
      </div>
    </div>
  
</body>
<style>
    /* Tus estilos CSS */
  

    .contenedor{
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .panel-arriba {
      position: absolute;
      top: 0;
      width: 100%;
      height: 80px;
      background: rgb(157, 195, 230);
      display: flex;
    }
    
    .panel-abajo {
      position: absolute;
      top: 80px;
      display: flex;
      width: 100%;
      height: calc(100% - 80px);
    }
    .panel-izquierda{
    position: absolute;  
    overflow: auto;
    width: 200px;
    height: 100%;
    background:rgb(227, 226, 226);
  }
.btn-1{
    padding: 20px;
    width: auto;
    height: 70px;
    margin-top: 30px;
    background:rgb(255,255,255);
  }

  .btn-1:hover{
    cursor: pointer;
    background: rgb(162, 217, 206);
    color: white;
  }

  .btn-salir{
    position: absolute;
    bottom: 20px;
    width: 200px;
    padding: 20px;
    height: 70px;
    
    background:rgb(220,30,30);
  }

  .btn-salir:hover{
    cursor: pointer;
    background: black;
    color: white;
  }


.menu-lateral {
      position: absolute;
      left: 200px;
      border-right: 1px solid black;
      height: 100%;
      width: 150px;

    }
.contenido {
      left: 350px;
      position: absolute;
      overflow: auto;  
      height: 100%;
      width: calc(100% - 350px);
      padding: 20px;
    }

    
    
    #p1,
    #p2,
    #p3,
    #p4 {
      cursor: pointer;
    }
    
    #p1:hover {
      color: blue;
    }
    
    #p2:hover {
      color: blue;
    }
    
    #p3:hover {
      color: blue;
    }
    
    #p4:hover {
      color: blue;
    }
    
  </style>
<script>
    // Tus scripts JavaScript
    document.getElementById("btn-1").addEventListener('click', () => {
      window.location.href = "http://localhost/kallpanet-profesores/profesores-admin.php";
    });

    document.getElementById("btn-2").addEventListener('click', () => {
      window.location.href = "http://localhost/kallpanet-profesores/ayuda.php";
    });

    document.getElementById("salir").addEventListener("click", function () {
      fetch("cerrar_sesion.php", {
        method: "POST"
      })
        .then(function (response) {
          if (response.ok) {
            // Redirecciona al usuario a una página de inicio de sesión u otra página relevante
            window.location.href = "http://localhost/kallpanet-profesores/login.php";
          } else {
            console.log("Error al cerrar sesión");
          }
        })
        .catch(function (error) {
          console.log("Error de red: " + error);
       
        });
    });
    <?php
echo '
 
    document.getElementById("p1").addEventListener("click", () => {
        window.location.href = "http://localhost/kallpanet-profesores/profesores.php?codigo=' . $parametro . '";
    });

    document.getElementById("p2").addEventListener("click", () => {
        window.location.href = "http://localhost/kallpanet-profesores/profesores-cursos.php?codigo=' . $parametro . '";
    });

    document.getElementById("p3").addEventListener("click", () => {
        window.location.href = "http://localhost/kallpanet-profesores/profesores-control-asistencia.php?codigo=' . $parametro . '";
    });

    document.getElementById("p4").addEventListener("click", () => {
        window.location.href = "http://localhost/kallpanet-profesores/profesores-calificaciones.php?codigo=' . $parametro . '";
    });
';
?>
var tabla = document.getElementById('tabla');


var rowCount = tabla.rows.length - 1;
for(let index = 0; index < rowCount; index++){
  console.log(index)
  let select = document.getElementById(`decimal_${index}`);
  for(let i=0; i<=20; i++){
    let option = document.createElement("option");
    option.value = i+"";
    option.text = i;
    select.add(option);
}  
}
/*
function procesar(e){
  let nota = document.getElementById(`nota_${e}`);
  let cod = document.getElementById(`cod_alumno_${e}`);
  nota.value = document.getElementById(`decimal_${e}`).value;
  cod.value = 
}
*/
  </script>

</html>