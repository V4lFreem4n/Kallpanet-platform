<!DOCTYPE html>
<html>
<head>
  <title>Kallpanet - Control de asistencia</title>
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
     $parametro = $_GET['codigo'];
     $sesion = $_GET['sesion'];
    //Vamos a comprobar que el cod_curso le pertenezca al profesor
    $codProfesor = $_SESSION['dni_profesor'];
    $consulta = "SELECT s.* FROM sesiones AS s 
    INNER JOIN cursos AS c ON s.cod_curso = c.cod_curso 
    INNER JOIN profesor AS p ON p.dni_profesor = c.dni_profesor WHERE c.cod_curso = '$parametro' AND p.dni_profesor='$codProfesor' AND
    s.id_sesion ='$sesion'"; 
    $resultado = mysqli_query($connection, $consulta);
    //Comprobamos, si está vacío, es que se accede a un curso que no le pertece al profe, si es que no, se procede normal
    if(mysqli_num_rows($resultado) > 0){ //Hay resultados
     
    }else{
     header("Location: 404.php");
     exit();
    }
 } else {
     header("Location: profesores-admin.php");
     exit();
 }
 ?>
 <div>
 

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
            <p id="p2">Asignar actividad</p>
            <p id="p3" style="text-decoration: underline;">Control de asistencia</p>
            <p id="p4">Calificaciones</p>
          </div>
          
          <div class="contenido" style="overflow: auto;">

          <?php
 require_once 'conexion_bd.php';
            $con = "SELECT * FROM sesiones WHERE id_sesion='$sesion'";
            $resp = mysqli_query($connection, $con);
    //Comprobamos, si está vacío, es que se accede a un curso que no le pertece al profe, si es que no, se procede normal
    if(mysqli_num_rows($resp) > 0){ //Hay resultados
            while($row = mysqli_fetch_assoc($resp)){
              echo '<h1>'.$row['nombre_sesion'].'</h1>';
            }
    }
?>

          <div style="font-family: sans-serif;">
          <table class="table" id="tabla">
  
  <thead class="table-warning">
      <tr>
      <th scope="col">Cod. Doc.</th>
      <th scope="col">Alumno</th>
      <th scope="col">¿Asistió?</th>
       
      </tr>
  </thead>
  <tbody>
  <form action="consultas/asistencias/asistencia.alumno.php" method="POST" id="form-asistencia">
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
      
      echo '<td scope="col">'.$calu.'</td>';
      echo '<td scope="col">'.$row['nombre'].' '.$row['apellido'].'</td>';
       
     require_once "conexion_bd.php"; 
     $query = "SELECT * FROM asistencia WHERE id_sesion='$sesion' AND dni_alumno='$calu'";
     $response = mysqli_query($connection,$query);
      //$fila['nombre_asistencia']

     if(mysqli_num_rows($response) == 0){
        echo '<td><select id="asistencia_'.$contador.'" name="asistencia['.$contador.']"><option value="si">SI</option><option value="no">NO</option></select></td>';
     }else{
        $filas = mysqli_fetch_assoc($response);
        if($filas['nombre_asistencia'] == 'si'){
            echo '<td><select><option value="si" disabled>SI</option></select></td>';
        }else{
            if($filas['nombre_asistencia'] == 'no'){
            echo '<td><select><option value="no" disabled>NO</option></select></td>';     
            }  
        }
     }
       
      
      echo '<td>
       
      <input type="hidden" value="'.$parametro.'" name="parametro">
      
      
      <input type="hidden" id="cod_alumno_'.$contador.'" value="'.$row['dni_alumno'].'" name="codigo-alumno"">      
      ';
      
//Comprobamos, si está vacío, es que se accede a un curso que no le pertece al profe, si es que no, se procede normal
 
      echo '
      </td>
      
      </tr>
      ';
      $contador++;
      }
       
     
    }
      ?>
      </tbody>
  </table>
  <button type="button" class="btn btn-primary">SUBIR</button>
  </form>
          </div>
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

function crearAsistencia(){
document.getElementById("add-sesion").style.display = "flex";
}

function cerrarAsistencia(){
  document.getElementById("add-sesion").style.display = "none";  
}

function subirDatos(){
let input = document.getElementById("input-sesion");
if(input.value == ""){
//Vamos a comprobar que el campo contenga datos, y no esté vacío
alert("Ha dejado el input vacío.");
}else{
  document.getElementById("formulario").submit();
}  

}

  </script>

</html>
