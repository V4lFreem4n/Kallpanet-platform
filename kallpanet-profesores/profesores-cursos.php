<!DOCTYPE html>
<html>
<head>
<title>Kallpanet-Profesores</title>

  <link href="css/normalize.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
    <div class="add-actividad-opacidad" id="add-actividad-opacidad" style="display: none;font-weight: 600;font-family: 'Roboto Flex', sans-serif;"><!--style="display: none;"-->
      <form id="form-add-activity" method="POST" action="consultas/actividades/crear_actividades_tabla.php">
      <div class="input-activity" style="padding: 10px;overflow:auto">
        <div class="div-salir" style="display: flex;justify-content: flex-end;"><img src="images/salir.png" class="salir" id="salir-opacidad" style="height:40px"></div>
        
        <div style="display: flex;justify-content: center;"><h6>ASIGNAR ACTIVIDAD</h6></div>
        <div><p>Nombre de la Actividad</p>
        <input style="width: 100%" id="nombre_actividad" name="nombre-actividad"></div>
        <div><p>Subir material</p>
        <input type="file" id="file_actividad" name="archivo">
      </div>
      <div style="display: flex;">
        <div>
        <div><p>Fecha activación</p></div>
        <div>
          <div class="input-group date" id="date_inicio">
               <input type="text" autocomplete="off" class="form-control" id="fecha_inicio" oninput="verificarFecha()" readonly>
               <input type="hidden" id="input-hidden-finicio" name="fecha-inicio">
               <span class="input-group-append">
               <span class="input-group-text bg-white">
               <i class="fa fa-calendar"></i>
            </span>
          </span> 
         </div>
        </div>
        </div>
        <div style="margin-left: 20px;">
        <div><p>Hora de activación</p></div>
        <div style="display:flex; align-items:center">
         
          <select name="hora-inicio" id="hora-inicio"></select>
          <select name="minutos-inicio" id="minutos-inicio"></select>
        </div>
        </div>
        
      </div>
      <!---->
      <div style="display: flex;">
        <div>
        <div><p>Fecha de cierre</p></div>
        <div>
          <div class="input-group date" id="date_cierre">
               <input type="text" autocomplete="off" class="form-control" id="fecha_cierre" readonly>
               <input type="hidden" id="input-hidden-fcierre" name="fecha-cierre" >
               <span class="input-group-append">
               <span class="input-group-text bg-white">
               <i class="fa fa-calendar"></i>
            </span>
          </span> 
         </div>
        </div>
        </div>
        <div style="margin-left: 20px;">
        <div><p>Hora de cierre</p></div>
        <div style="display:flex; align-items:center">
         
          <select name="hora-cierre" id="hora-cierre"></select>
          <select name="minutos-cierre" id="minutos-cierre"></select>
        
        </div>
        </div>
        
      </div>
        <!---->
        <div>
          <p>Descripciónd de la actividad</p>
          <textarea style="width: 100%;" id="descripcion_actividad" name="descripcion"></textarea>
        </div>
        <div>
          <p>Seleccione una actividad del sílabo</p>
          <select  name="actividad-silabo" id="actividad-silabo">
          <option disabled selected value="">Actividad del sílabo</option>
          </select>
        </div>
        <input type="hidden" name="cod_curso" value="<?php echo $parametro?>">

        <input type="hidden" name="id_tema" id="id--tema">

       <div style="display: flex;justify-content:end">
       <button type="button" class="btn btn-success" onclick="validarFormActividad()">GUARDAR</button></div> 
      </div>
      </form>
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
            <p id="p2" style="text-decoration: underline;">Asignar actividad</p>
            <p id="p3">Control de asistencia</p>
            <p id="p4">Calificaciones</p>
          </div>

          <div class="contenido">
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
            
            <h4>Asignar Actividad</h4>
            
            <?php

require "conexion_bd.php";
$consulta = "SELECT nombre, id_tema FROM temas WHERE cod_curso='$parametro'";
$resultado = mysqli_query($connection, $consulta);
if(mysqli_num_rows($resultado) > 0){
  $contador = 1;
  while($fila = mysqli_fetch_assoc($resultado)){

    $nombre_tema = $fila['nombre'];
    $id_tema = $fila['id_tema'];
    echo '<div id="div-tema_'.$id_tema.'" class="div-tema" style="margin-top: 20px; display: flex; align-items: center;padding-left:20px;padding-right:20px">
    <img src="images/libro-abierto.png" height="25px"><h5 style="margin-right: auto;"> - Tema '.$contador.' :'.$nombre_tema.'</h5>
            <div onclick="abrirCrearActividad('.$id_tema.')"><img src="images/add.png" style="height: 40px; display:flex;" class="imagen_add" id="add_actividad_'.$id_tema.'"></div>
            </div>';
            $query = "SELECT * FROM actividad WHERE id_tema='$id_tema'";
            $res = mysqli_query($connection, $query);
            if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
                echo '<div style="background: rgb(228, 228, 228);padding:20px">
  <div style="display: flex; background: rgb(197, 224, 180); margin-top: auto; margin-bottom: auto; justify-content: space-between;">
    <div style="margin-right: auto; display:flex">
      <p style="margin-top:auto;margin-bottom:auto; margin-left:20px">'.$row['nombre_actividad'].'</p><p style="margin-left:50px;margin-top:auto;margin-bottom:auto;font-style: italic;">Fecha de activación : <strong>'.$row['fecha_activacion'].'</strong></p>
    </div>
    <div style="margin-left: auto;display:flex">
      <button type="button" class="btn btn-primary" onclick="gestionar('.$row['id_actividad'].')"><img src="images/activity.png" height="25px"></button>
      <form method="POST" action="consultas/actividades/eliminarActividad.php">
      <input type="hidden" name="parametro" value="'.$parametro.'">
      <input type="hidden" name="actividad-eliminar" value="'.$row['id_actividad'].'">
      <button type="submit" class="btn btn-danger"><img src="images/eliminar.png" height="25px"></button>
      </form>
    </div>
  </div>
</div>
';
            }}
            
    $contador++;        
  }}
            
            ?>

            


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

    .div-tema{
      height: 50px;
      width: 100%;
      background:rgb(228, 228, 228);
    }

    .imagen_add{
      cursor: pointer;
    }
    .imagen_add:hover{
       border-radius: 50%;
       background:green;
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
      document.getElementById("nombre_actividad").value = '';
      document.getElementById("file_actividad").value = '';
      document.getElementById("date_inicio").value = '';
      document.getElementById("date_cierre").value = '';
      document.getElementById("descripcion_actividad").value = ''; 
    document.getElementById("add-actividad-opacidad").style.display = "none";

    });
    
    function abrirCrearActividad(e){
      document.getElementById("add-actividad-opacidad").style.display = "flex";
      document.getElementById("id--tema").value = e;
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


require_once 'conexion_bd.php';
$tablaSilabo = "SELECT * FROM silabo_actividad WHERE cod_curso='$parametro' "; //Elegimos solo a las actividades que corresponden al curso
$resultadoSilabo = mysqli_query($connection, $tablaSilabo);


echo "let tablaSilabo = [];";
echo "let actividad;";
while($row = mysqli_fetch_assoc($resultadoSilabo)){

  if($row['estado_uso'] == 'no'){
    echo "actividad = {id_silabo_actividad:'".$row['id_silabo_actividad']."', nombre_actividad:'".$row['nombre_actividad']."', peso:'".$row['peso']."', estado_uso:'".$row['estado_uso']."', cod_curso :'".$parametro."'};
tablaSilabo.push(actividad);";
  }

}
?>


for (let index = 0; index < tablaSilabo.length; index++) {
    let select = document.getElementById("actividad-silabo");
  let option = document.createElement('option');
     option.value = tablaSilabo[index].id_silabo_actividad;
     option.text = tablaSilabo[index].nombre_actividad;
     console.log(option.text);
     select.appendChild(option);
 
}  
function gestionar(e){
  window.location.href = `http://localhost/kallpanet-profesores/profesores-gestionar-actividad.php?actividad=${e}&codigo=<?php echo $parametro;?>`;
}

//Validaciones
function validarFormActividad(){
  let inputNombre = document.getElementById("nombre_actividad");
  let inputArchivo = document.getElementById("file_actividad");
  let inputDescripcion = document.getElementById("descripcion_actividad");
 let inputFechaInicio = document.getElementById("input-hidden-finicio");
 let inputFechaCierre = document.getElementById("input-hidden-fcierre");



if(inputNombre.value !== "" && inputArchivo.files.length > 0 && inputArchivo.files &&
   inputDescripcion.value !== "" && inputFechaInicio.value !== "" && inputFechaCierre.value !== ""){
    document.getElementById("form-add-activity").submit();
}else{
  alert("¡Rellene todos los espacios vacíos!");
}
}

  //Cargamos los select del input activity flotante, donde creamos actividades

for(let i = 0; i < 24; i++){  
let option = document.createElement("option");
option.value = i;
option.text = i + "hrs";
document.getElementById("hora-inicio").add(option, null);
}  
for(let i = 0; i < 24; i++){  
let option = document.createElement("option");
option.value = i;
option.text = i + "hrs";
document.getElementById("hora-cierre").add(option, null);
}
for(let i = 0; i < 60; i++){
  let option = document.createElement("option");
option.value = i;
option.text = i + "min";
document.getElementById("minutos-inicio").add(option, null);
}
for(let i = 0; i < 60; i++){
  let option = document.createElement("option");
option.value = i;
option.text = i + "min";
document.getElementById("minutos-cierre").add(option, null);
}  

//Si el input fecha inicio no está rellena el input cierre se bloquea
document.getElementById("fecha_cierre").disabled = true;    
function verificarFecha(){
  console.log(document.getElementById("fecha_inicio").value);
//Vamos a poner el Date con el formato seleccionado
if(document.getElementById("fecha_inicio").value !== ""){
  document.getElementById("fecha_cierre").disabled = false;
}else{
  document.getElementById("fecha_cierre").disabled = true;
} 
}

  </script>
  <script type="text/javascript">
        $(function() {
            $('#date_inicio ').datepicker().on('changeDate', function (ev) {
              document.getElementById("fecha_cierre").disabled = false;
});
        });

        $(function() {
            $('#date_cierre ').datepicker().on('changeDate', function (ev) {
              //Vamos a caputurar las fechas;
              let arrayFecha1 = [];
              let arrayFecha2 = [];
              let f1 =  document.getElementById("fecha_inicio").value;
              let f2 =  document.getElementById("fecha_cierre").value;
              arrayFecha1 = f1.split("/");
              arrayFecha2 = f2.split("/");
              
              let fecha1 = new Date(arrayFecha1[2] + "-" + arrayFecha1[0] + "-" + arrayFecha1[1]);
              let fecha2 = new Date(arrayFecha2[2] + "-" + arrayFecha2[0] + "-" + arrayFecha2[1]);
              if(fecha2 < fecha1){//Si la segunda fecha es menor a la anterior se sale una alerta y se vacía el input...
                alert("Elija una fecha válida");
                document.getElementById("fecha_cierre").value = "";
              }else{
                document.getElementById("input-hidden-fcierre").value = arrayFecha2[2] + "-" + arrayFecha2[0] + "-" + arrayFecha2[1];
                document.getElementById("input-hidden-finicio").value = arrayFecha1[2] + "-" + arrayFecha1[0] + "-" + arrayFecha1[1];
                
                
              }
                
        });});
    </script>
   
</html>
