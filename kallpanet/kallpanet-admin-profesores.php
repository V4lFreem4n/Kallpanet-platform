<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/kallpanet-admin.css">
    <link rel="stylesheet" href="css/kallpanet-admin-paneles.css">

    <?php
    session_start();
    require_once 'validar_sesion.php';
    ?>
</head>
<div class="fondo">
      <body>
    <div class="pan_left" id="pan-left">
    <div class="datos-admin" style="margin-top:15px; margin-left:15px; max-width: 200px; word-wrap: break-word;">
            <h6 style="color:rgb(111,111,111);">ADMINISTRADOR</h6>
            <!-- ACÁ ABRIMOS UN PHP PARA MOSTRAR EL NOMBRE DE LA BASE DE DATOS -->
            <h5 style="color:white">
            <?php 
            echo $_SESSION['nombre'];
            ?>
          </h5>
            <h6 style="color:rgb(111,111,111);">INSTITUCION</h6>
            <!-- ACÁ ABRIMOS UN PHP PARA MOSTRAR EL NOMBRE DE LA BASE DE DATOS -->
            <h5 style="color:white">
            <?php 
            echo $_SESSION['cod_institucion'];
            ?>
          </h5>
            
        </div>
        <h7 style="color:rgb(111,111,111); margin-top:15px;">PRINCIPAL</h7>
        
<div class="tablero" style="margin-bottom: 15px;">  

<!--acordeon-->
<div class="accordion" id="myAccordion">

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        TABLERO
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="tickets">
        Tickets
      </div>
    </div>
    <!---->
     
  </div>
</div>

<!--fin - acordeon-->
</div>
<h7 style="color:rgb(111,111,111); margin-top:25px;">SISTEMA</h7>
<div class="grados-pan" id="btn_grados">
GRADOS
</div>
<div class="secciones-pan" id="btn_secciones">
SECCIONES
</div>
<!--CURSOS-->
<div class="contenedor-cursos">
<div class="accordion" id="myAccordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        CURSOS
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="cursos-modificar">
        Modificar Cursos
      </div>
    </div>
    <!---->
    <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="cursos-actividad">
        Ver Actividad
      </div>
    </div>
  </div>
</div>
</div>

<!---PROFESORES--->
<div class="contenedor-profesores">
<div class="accordion" id="myAccordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" id="btn_profesores">
        PROFESORES
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse show " aria-labelledby="headingThree" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="profesores-modificar" style="background:#F0FFFF;color:black;cursor:pointer">
        Modificar Profesores
      </div>
    </div>
    <!---->
    <div id="collapseThree" class="accordion-collapse show " aria-labelledby="headingThree" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="profesores-actividad" style="cursor:pointer">
        Ver Actividad
      </div>
    </div>
  </div>
</div>
</div>
<!--ALUMNOS-->
<div class="contenedor-alumnos">
<div class="accordion" id="myAccordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
       ALUMNOS
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingFour" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="alumnos-modificar" style="cursor:pointer">
        Modificar Alumnos
      </div>
    </div>
    <!---->
    <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingFour" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="alumnos-actividad" style="cursor:pointer">
        Ver Actividad
      </div>
    </div>
  </div>
</div>
</div>
<div class="salir" id="cerrar_sesion">SALIR</div>
    </div>
<div class="pan-right">
  <div class="container">

  <div class="error-profesores-empty" id="error-profesores-empty" style="display:none">
    <div class="alert alert-warning" role="alert">
                      ¡Complete todos los campos!
                      </div>
    </div>

  <div class="visible" id="pan_grados">

  <!--<div class="grados-panel-up"><div class="text-left"><h3>Lista de grados de la Institucion </h3></div><div class="text-right"></div></div>-->

    <div class="panel-up" style="margin-bottom: 20px;" ><div class="text-left"><h3>Lista de Profesores </h3></div><div class="text-right"><div class="add-button" id="add-profesor">AÑADIR PROFESORES</div></div></div>
    <div class="form-profesores-panel-up" style="display: none;background: rgb(209, 231, 221); padding:20px" id="panel-add-profesor">
    <div class="form-prof-right"></div>
<!--tabla-->
<form method="POST" action="php_crud/profesores/subir_profesores.php" id="addProfesorForm">
<table class="table table-sm table-success">
  <thead>
    <tr>
      <th scope="col">DOC. IDENTIDAD</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">USUARIO</th>
      <th scope="col">CONTRASEÑA</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>
        <div style="display: flex;">
        <select id="nacionalidad" onchange="elegirNacionalidad()">
        <option selected disabled>NAC</option>
        <option value="8">PE</option>
        <option value="8">AR</option>
<option value="9">AT</option>
<option value="11">BE</option>
<option value="8">BO</option>
<option value="11">BR</option>
<option value="8">CL</option>
<option value="10">CO</option>
<option value="9">CR</option>
<option value="11">CU</option>
<option value="9">DE</option>
<option value="11">DO</option>
<option value="10">EC</option>
<option value="11">EE</option>
<option value="9">ES</option>
<option value="9">FR</option>
<option value="13">GT</option>
<option value="13">HN</option>
<option value="11">HR</option>
<option value="16">ID</option>
<option value="7">IE</option>
<option value="9">IT</option>
<option value="11">LV</option>
<option value="18">MX</option>
<option value="14">NI</option>
<option value="9">NL</option>
<option value="11">NO</option>
<option value="11">PA</option>
<option value="12">PH</option>
<option value="9">PL</option>
<option value="9">PR</option>
<option value="9">PT</option>
<option value="8">PY</option>
<option value="9">RO</option>
<option value="13">RS</option>
<option value="9">SV</option>
<option value="11">TR</option>
<option value="10">UA</option>
<option value="9">US</option>
<option value="7">UY</option>
<option value="8">VE</option>



        </select>
      <input style="width: 120px;" name="profesorDni" id="dni_input" oninput="digitosDisponibles()"></div>
      <input type="hidden" id="profesor_dni" name="profesor_dni">
        <div style="display: flex;"><p id="digitos" style="margin-left: 5px;margin-right: 5px;">NA</p><p> dígitos disponibles</p></div>
      </td>
      <td>
      <input name="profesor_nombre" id="profesor_nombre">
      </td>
      <td>
      <input name="profesor_apellido" id="profesor_apellido">
      </td>
      <td>
      <input style="width: 150px;" name="profesor_usuario" id="profesor_usuario">
      </td>
      <td>
      <input style="width: 150px;" name="profesor_contrasena" id="profesor_contrasena">
      </td>
      <td>
      

      <button type="button" class="btn btn-primary" onclick="subirProfesores()">Guardar</button>
      <button type="button" class="btn btn-danger" id="descartar-add-profesor" onclick="recargar()">X</button>
      </td>
     
    </tr>
    </tbody>
</table>
</form>
</div>
</div>
<?php
if (isset($_GET['error'])) {
  $mensaje_error = $_GET['error'];
  echo '<div class="alert alert-danger" role="alert" style="margin-top:10px">' . $mensaje_error . '</div>';
}
?>
    <div class="form-profesores-table" style="margin-top: 20px;">
    <table class="table table-sm" id="tabla_profesores">
  <thead>
    <tr>
      <th scope="col">DOC. IDENT</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">CURSOS ASIGNADOS</th>
      <th scope="col">USUARIO</th>
      <th scope="col">CONTRASEÑA</th>
      <th scope="col" class="text-end">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php

require_once 'conexion_bd.php';
$consulta = "SELECT * FROM profesor";
$resultado = mysqli_query($connection,$consulta);
 
if(mysqli_num_rows($resultado) > 0){
  $contador_id = 0;
  while($fila = mysqli_fetch_assoc($resultado)){

    $datos = $fila;
    $dni_profesor = $fila['dni_profesor'];
    $nombre_profesor = $fila['nombre'];
    $apellido_profesor = $fila['apellido'];
    $usuario_profesor = $fila['usuario'];
    $contrasena_profesor = $fila['contrasena'];

    echo "<tr>
    <td>".$dni_profesor."</td>
    <td>".$nombre_profesor."</td>
    <td>".$apellido_profesor."</td>
    <td>
    <div>";
      //Acá vamos a poner los cursos asignados con su respectiva sección y grado
      $query = "SELECT p.*,c.nombre AS nombre_curso, c.cod_curso, s.nombre_seccion, s.cod_seccion, g.nombre_grado  FROM profesor as p INNER JOIN cursos as c ON p.dni_profesor = c.dni_profesor
      INNER JOIN secciones AS s ON c.cod_seccion = s.cod_seccion INNER JOIN grados AS g ON s.cod_grado = g.cod_grado WHERE p.dni_profesor = '$dni_profesor'";
$res = mysqli_query($connection,$query);
if(mysqli_num_rows($res) > 0){
  while($row = mysqli_fetch_assoc($res)){
    echo'<div style="display:flex;"><p style="color:brown; margin-right:5px; font-size: 14px;">'.$row['nombre_curso'].'</p><p style="color:blue;margin-right:5px;font-size: 14px;">'.$row['nombre_seccion'].'</p> <p style="color:green;font-size: 14px;">'.$row['nombre_grado'].'</p></div>';
  }
}
      echo '</div></td>
      <td>'.$usuario_profesor.'</td>
      <td scope="row"><div style="display:flex"><div style="margin-right:10px" id="ocultar_mostrar_'.$contador_id.'"><img id="imagen_mostrar_'.$contador_id.'" src="images/invisible.png" style="width:20px; height:20px"></div><p id="contrasena_'.$contador_id.'">'.$fila['contrasena'].'</p></div></td>
      <td class="text-end">
      <form method="POST" action="php_crud/profesores/eliminar.php">
      <input value="'.$dni_profesor.'" name="dni" type="hidden">
      <button type="submit" class="btn btn-danger"><img src="images/eliminar.png" height="25px"></button>
      </form>
      </td>
    </tr>';
    $contador_id++;
                }
}
    ?>
    </tbody>
</table>

    </div>
  </div>
</div></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/kallpanet-admin.js"></script>
    <script>
      document.getElementById("add-profesor").addEventListener('click', ()=>{
        document.getElementById("panel-add-profesor").style.display = 'block';
      });
      document.getElementById("descartar-add-profesor").addEventListener('click', ()=>{
        document.getElementById("panel-add-profesor").style.display = 'none';
      });

//ACÀ PONESMO EL OCULTAR O MOSTRAR CONTRASEÑA


let array_contrasenas = [];

var tabla = document.getElementById('tabla_profesores');
var cantidadFilas = tabla.rows.length - 1;
      for (let i = 0; i < cantidadFilas; i++) {
  console.log(i)
  let valor = document.getElementById(`contrasena_${i}`).textContent;
//Formamos el arry con los 2 valores
    let asteriscos = ""; 
    for(let index = 0; index < valor.length; index++){
    asteriscos = "*" + asteriscos;
    }
    let objeto = {visible:valor, invisible:asteriscos, estado:"oculto"}; //el otro valor de estado es "visible"
  array_contrasenas.push(objeto);
  document.getElementById(`contrasena_${i}`).textContent = array_contrasenas[i].invisible;

  let ojo = document.getElementById(`ocultar_mostrar_${i}`);
  ojo.style.cursor = "pointer"; 

  console.log(document.getElementById(`imagen_mostrar_${i}`));

  ojo.addEventListener('click', ()=>{
    if(array_contrasenas[i].estado == "oculto"){
      document.getElementById(`contrasena_${i}`).textContent = array_contrasenas[i].visible;
      array_contrasenas[i].estado = "visible";
      document.getElementById(`imagen_mostrar_${i}`).src = "images/visible.png";  
    }else{
      if(array_contrasenas[i].estado == "visible"){
      document.getElementById(`contrasena_${i}`).textContent = array_contrasenas[i].invisible;
      array_contrasenas[i].estado = "oculto";
      document.getElementById(`imagen_mostrar_${i}`).src = "images/invisible.png";   
    }
    }
    
  })  
}
document.getElementById("dni_input").disabled = true;
//Mostramos digitos màximos en caso de elegir alguna nacionalidad
function elegirNacionalidad(){
    let digitos = document.getElementById("nacionalidad").value;
    let p = document.getElementById("digitos");
    p.textContent = digitos;
    document.getElementById("dni_input").disabled = false;
    
}
function digitosDisponibles(){
      var currentLength = document.getElementById("dni_input").value.length;
      let digitos = document.getElementById("nacionalidad").value;
      digitos = parseInt(digitos);
      let p = document.getElementById("digitos");
      if(digitos > currentLength){
        p.textContent = digitos - currentLength;  
      }else{
        p.textContent = 0;
        document.getElementById("dni_input").disabled = true;
      }
    } 
 
    function recargar(){
      location.reload();
    }

    function subirProfesores(){
      let select =document.getElementById("nacionalidad").value;
      let inDni = document.getElementById("dni_input").value;
      let nombre = document.getElementById("profesor_nombre").value;
      let apellido = document.getElementById("profesor_apellido").value;
      let usuario = document.getElementById("profesor_usuario").value;
      let contrasena = document.getElementById("profesor_contrasena").value;
       
     if(select !== -1 && select !=="NAC" && inDni !== "" && nombre !== "" && apellido !== "" && usuario !== "" && contrasena !== ""){
      document.getElementById("profesor_dni").value = inDni;
      document.getElementById("addProfesorForm").submit();
     }else{
      document.getElementById("error-profesores-empty").style.display = "block";
      setTimeout(function(){
        document.getElementById("error-profesores-empty").style.display = "none"; 
      }, 3000);
      
     } 
    }
    </script>
  </body>
</html>
