<!DOCTYPE html>
<html>
<head>
  <title>Kallpanet-Profesores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Pacifico&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/loginKallpanet_vcf.css">
</head>
<script>
  function limpiarURL() {
    var nuevaURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
    window.history.replaceState({path: nuevaURL}, '', nuevaURL);
}
  limpiarURL();
</script>
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
    <form method="POST" action="consultas/profesores/add-subtemas.php" enctype="multipart/form-data" id="form-subtema-add">
    <div class="add-actividad-opacidad" id="add-actividad-opacidad" style="display: none;"semana 1><!--style="display: none;"-->
      <div class="input-activity" style="padding: 10px;overflow:auto">
      <div class="div-salir" style="display: flex;justify-content: flex-end;"><img src="images/salir.png" class="salir" id="salir-opacidad" style="height:40px"></div>
      <div style="display:flex;"><div style="margin-left: auto;margin-right:auto"><h5>AÑADIR SUBTEMA</h5></div></div>
      <p>Nombre del material extra</p>
      <input  style="width: 100%;" name="nombre" id="nombre_subtema">
      <input type="hidden" name="id_tema" value="" id="input_id_tema">
      <div>
        <p>Material extra</p>
        <input type="file" name="archivo" id="archivo_subtema">
        <input type="hidden" value="<?php echo $parametro;?>" name="cod_curso">
      </div>
      <div style="display: flex;">
      <button type="button" class="btn btn-primary" style="margin-left:auto; margin-top:10px" onclick="addSub_tema()">GUARDAR</button>
      </div>   
    </div>
    </div>
    </form>
    <!--OPACIDAD-->
    <div class="contenedor">
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
            <p id="p1" style="text-decoration: underline;">Vista general</p>
            <p id="p2">Asignar actividad</p>
            <p id="p3">Control de asistencia</p>
            <p id="p4">Calificaciones</p>
          </div>

          <div class="contenido" >
            <div style="display:flex">
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
            ?>
            <div style="margin-left: auto;"><button type="button" class="btn btn-warning" id="crear_tema" onclick="crearTema()">CREAR TEMA</button></div>
            </div>

            <div id="error_espacio" style="margin-top: 10px;margin-bottom:10px; display:none"></div>
            <?php 
              $dni_profesor = $_SESSION['dni_profesor'];
              $query = "SELECT p.*,c.nombre AS nombre_curso, c.cod_curso, s.nombre_seccion, s.cod_seccion, g.nombre_grado  FROM profesor as p INNER JOIN cursos as c ON p.dni_profesor = c.dni_profesor
                INNER JOIN secciones AS s ON c.cod_seccion = s.cod_seccion INNER JOIN grados AS g ON s.cod_grado = g.cod_grado WHERE p.dni_profesor = '$dni_profesor' AND c.cod_curso = '$parametro'";
          $res = mysqli_query($connection,$query);
          if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
              echo'<div style="display:flex;"><p style="color:blue;margin-right:5px;font-size: 14px;">'.$row['nombre_seccion'].'</p> <p style="color:green;font-size: 14px;">'.$row['nombre_grado'].'</p></div>';
            }
          }


            if(isset($_GET['error'])){
              
              echo '<div class="alert alert-warning" id="error1" role="alert">
              '.$_GET['error'].'
          </div>';
          
            }
            
            ?>
            <form method="POST" action="consultas/profesores/insertar_temas.php">
            <div style="padding:20px;display:flex;background:rgb(254,224,164);margin-bottom:20px; display:none" id="add_tema">
              <div style="display: flex;"><h5 style="margin-left: 10px;margin-right: 10px;">Nombre del tema</h5><input id="input-tema" name="input-tema"></div>
              <div style="margin-left: auto;">
              <input type="hidden" value="<?php echo $parametro;?>" name="cod_curso">
              <button type="submit" class="btn btn-primary">GUARDAR</button>
              <button type="button" class="btn btn-danger" onclick="cerrar_addTema()">DESCARTAR</button>
              </div>
            </div>
            </form>
          
            <?php
require "conexion_bd.php";
$consulta = "SELECT nombre, id_tema FROM temas WHERE cod_curso='$parametro'";
$resultado = mysqli_query($connection, $consulta);
if(mysqli_num_rows($resultado) > 0){
  while($fila = mysqli_fetch_assoc($resultado)){
    $nombre_tema = $fila['nombre'];
    $id_tema = $fila['id_tema'];
    echo '<!--tema-->
    <div class="accordion" id="'.$fila['id_tema'].'" style="margin-top: 20px;">
      <div class="accordion-item">
        <div class="accordion-header" id="headingOne">
          <div style="display:flex;">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'.$id_tema.'_col" aria-expanded="false" aria-controls="collapseOne">
            <img src="images/libro-abierto.png" height="25px" styles="margin-right:5px"><h5 styles="margin-left:10px">Tema : '.$nombre_tema.'</h5>
            </button>
            <div style="display: flex;height:40px;margin-top:auto;margin-bottom:auto">
              <button type="button" class="btn btn-success" style="margin-right: 10px;margin-left: 10px;" onclick="addSubtema('.$id_tema.')"><img src="images/anadir.png" height="25px"></button>
              <button type="button" class="btn btn-danger" onclick="eliminar('.$id_tema.')"><img src="images/eliminar.png" height="25px"></button>
            </div>
          </div>
        </div>';
        $query = "SELECT nombre, fecha, hora, ruta FROM subtema WHERE id_tema='$id_tema'";
        $res = mysqli_query($connection, $query);
        if(mysqli_num_rows($res) > 0){
          while($row = mysqli_fetch_assoc($res)){
            echo '<!--subtema-->
            <div id="'.$id_tema.'_col" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="'.$id_tema.'">
              <div style="width: 100%;height:50px;border:1px solid blue;background:rgb(223, 236, 255);display:flex">
              <div style="margin-top:auto;margin-bottom:auto; margin-left:20px; display:flex"><img src="images/documentos.png" height="25px" styles="margin-right:5px"><h6 style="margin-left:10px">'.$row['nombre'].'</h6></div>
              <div style="margin-left:auto; margin-right:20px;margin-top:auto;margin-bottom:auto;"><a href="'.$row['ruta'].'" download>Descargar archivo</a></div>
              </div>
            </div>
            <!--subtema-->';
          }
        } else {
          echo '';
        }
        echo '</div>
      </div>
    <!--tema-->';
  }
}
?>


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
    
    .contenido {
      left: 350px;
      position: absolute;
      overflow: auto;  
      height: 100%;
      width: calc(100% - 350px);
      padding: 20px;
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
      height: 300px;
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

    .accordion-button:active, .accordion-button:focus{
      box-shadow: none !important;
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

    function addSubtema(e){
      document.getElementById("add-actividad-opacidad").style.display = "flex";  
      document.getElementById("input_id_tema").value = e;
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
function crearTema(){
document.getElementById("add_tema").style.display = "flex";
}

function cerrar_addTema(){
  document.getElementById("add_tema").style.display = "none";  
}

function eliminar(e){
 // Crea un objeto FormData
 var formData = new FormData();
  
  // Agrega el parámetro al objeto FormData
  formData.append('numero', e);
  formData.append('codigo', <?php echo $parametro;?>);
  // Realiza la solicitud utilizando Fetch API
  fetch('consultas/profesores/eliminar.php', {
    method: 'POST',
    body: formData
  })
  .then(function(response) {
    // Maneja la respuesta de la solicitud
    if (response.ok) {
      console.log('Parámetro enviado correctamente');
      location.reload(); // <<---------------------------------------------se recarga la página
      // Realiza alguna acción adicional si es necesario
    } else {
      console.log('Error al enviar el parámetro');
      // Maneja el error si es necesario
    }
  })
  .catch(function(error) {
    console.log('Error en la solicitud:', error);
    // Maneja el error de la solicitud
  }); 
}

function addSub_tema(){
 let nombreInput = document.getElementById("nombre_subtema").value;
 let archivoInput  =  document.getElementById("archivo_subtema");
 console.log(archivoInput.files);
 if( archivoInput.files.length === 0 && nombreInput.value.trim() === ''){
  alert("¡Rellene todos los campos!");
  
 }else{
 
  document.getElementById("form-subtema-add").submit();
 }
}

  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>
