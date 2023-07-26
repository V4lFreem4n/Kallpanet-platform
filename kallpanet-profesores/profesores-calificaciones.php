<!DOCTYPE html>
<html>
<head>
  <title>Kallpanet Profesores - calificaciones</title>
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
   //Vamos a comprobar que el cod_curso le pertenezca al profesor
   $codProfesor = $_SESSION['dni_profesor'];
   $consulta = "SELECT * FROM cursos WHERE cod_curso='$parametro' AND dni_profesor='$codProfesor'"; 
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
    <!--OPACIDAD--> 
    <div class="add-actividad-opacidad" id="add-actividad-opacidad" style="display: none;"><!--style="display: none;"-->
    <!--FORMULARIO ENVIAR-->
    <form method="POST" action="consultas/actividades/addActividades.php">
      <div class="input-activity" style="padding: 10px;overflow:auto">
      <div class="div-salir" style="display: flex;justify-content: flex-end;"><img src="images/salir.png" class="salir" id="salir-opacidad" style="height:40px"></div>
      
      <div><h4>CREAR SÍLABO</h4><button type="button" class="btn btn-info" onclick="crearEvaluacion()">CREAR EVALUACIÓN</button></div>
      
      
      <div style="padding: 20px;">
        <table class="table table-bordered border-primary" >
        <thead>
    <tr>
      <th scope="col">Nombre Actividad</th>
      <th scope="col">Peso</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="cuerpo-silabo-tabla">
    
    </tbody>
        </table>
        <div style="display: flex;">
        <input type="hidden" name="cod_curso" value="<?php echo $parametro;?>">
        <button type="submit" class="btn btn-primary" style="margin-left: auto;">PROCESAR</button>
        </div>
        </div>
        
    </div>
    </form>
    <!--FORMULARIO ENVIAR-->
    </div>
    <!--OPACIDAD-->
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
            <p id="p3">Control de asistencia</p>
            <p id="p4" style="text-decoration: underline;">Calificaciones</p>
          </div>

          <div class="contenido">
            <div>
            <div style="display: flex;"><div>
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
            <h4>Calificaciones</h4></div>
            <?php
            $consulta = "SELECT * FROM silabo_actividad WHERE cod_curso='$parametro'";
            $resultado = mysqli_query($connection, $consulta);
            if(!(mysqli_num_rows($resultado) > 0)){ //Existe no existe sílabo mostramos el input del sílabo p
              echo '<div style="margin-left: auto;">
            <button type="button" class="btn btn-success" onclick="crearSilabo()">CREAR SÍLABO</button>
            </div>';
            }
            
            ?>
            </div>
            
            <?php
            echo '<div style="width: calc(100% - 350px);">
            <table class="table table-bordered">
            <thead>
    <tr class="table-info" style="position: sticky;top: -20px;">
      <th scope="col">DNI</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      ';
      $CONTADOR = 0;    

            $consulta = "SELECT * FROM silabo_actividad WHERE cod_curso='$parametro'";
            $resultado = mysqli_query($connection, $consulta);
            if(mysqli_num_rows($resultado) > 0){ //Existe existe sílabo mostramos las tablas de alumnos p
              while($fila = mysqli_fetch_assoc($resultado)){
              echo '<th scope="col">'.$fila['nombre_actividad'].'</th>';
              $id_actividad = $fila['id_silabo_actividad'];
              $CONTADOR++;
            }}
        echo '
      </tr>
    </thead>
    <tbody>
      
        ';
        //Acá vamos a mostrar a todos los alumnos
              $consulta = "SELECT alumnos.*
              FROM alumnos
              INNER JOIN secciones ON alumnos.cod_seccion = secciones.cod_seccion
              INNER JOIN cursos ON secciones.cod_seccion = cursos.cod_seccion
              WHERE cursos.cod_curso = '$parametro';
              ";
              $resultado = mysqli_query($connection, $consulta);
              if(mysqli_num_rows($resultado) > 0){ //Existe existe sílabo mostramos las tablas de alumnos p
              while($row = mysqli_fetch_assoc($resultado)){
              $dni = $row['dni_alumno'];  
              echo '<tr>';  
              echo '<td scope="col">'.$dni.'</td>';
              echo '<td scope="col">'.$row['nombre'].'</td>';
              echo '<td scope="col">'.$row['apellido'].'</td>';
              
              for ($i=0; $i < $CONTADOR; $i++) { 
                echo '<td scope="col">';
                $con = "SELECT * FROM actividades_subidas_alumnos WHERE dni_alumno='$dni' AND orden_actividad_pertenencia='$i'";
                $re = mysqli_query($connection, $con);
                if(mysqli_num_rows($re) > 0){ //Existe existe sílabo mostramos las tablas de alumnos p
                while($rw = mysqli_fetch_assoc($re)){ 
                echo '<p>'.$rw['nota'].'</p>';  
                echo '</td>';
              }  
            }}
            echo '</tr>';
          }}
        echo '
      
      <!---->
    </tbody>
              </table>
  
              </div>';
            
            
            ?>

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
    

    .add-actividad-opacidad{
      z-index: 100;
      background:rgb(138, 141, 151, 0.7);
       
      height: 100%;
      width: 100%;
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .input-activity{
      overflow: auto;  
      height: 500px;
      width: 450px;
      background: white;
       
    }
    .salir{
      cursor: pointer;
    }
    .salir:hover{
        border-radius: 50%;
        border: 2px solid black;
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

    document.getElementById("salir-opacidad").addEventListener('click', ()=>{ 
    document.getElementById("add-actividad-opacidad").style.display = "none";

    });

    function crearSilabo(){
        document.getElementById("add-actividad-opacidad").style.display = "flex"; 
    }

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
contador = 0;
function crearEvaluacion(){
  
  var fila = document.createElement('tr');
  fila.innerHTML = `<tr>
      <td>
      <input type="hidden" name="orden" value="${contador}">
        <input type="hidden" name="fila_nombre[]">
        <input name="fila_nombre_${contador}">
      </td>
      <td>
        <select id="fila_peso_${contador}" name="peso_${contador}">
  <option value="1">01</option>
  <option value="2">02</option>
  <option value="3">03</option>
  <option value="4">04</option>
  <option value="5">05</option>
  <option value="6">06</option>
  <option value="7">07</option>
  <option value="8">08</option>
  <option value="9">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
</select>

      </td>
      <td>
      <button type="button" class="btn btn-danger">Descartar</button>
      </td>
      
      </tr>
    `;
    contador++;
    document.getElementById("cuerpo-silabo-tabla").appendChild(fila);
}
  </script>

</html>
