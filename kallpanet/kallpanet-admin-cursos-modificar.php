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
<body>
    <div class="fondo">
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
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        CURSOS
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse show" aria-labelledby="headingTwo" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="cursos-modificar" style="background:#F0FFFF;color:black">
        Modificar Cursos
      </div>
    </div>
    <!---->
    <div id="collapseTwo" class="accordion-collapse show " aria-labelledby="headingTwo" data-bs-parent="#myAccordion">
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
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="btn_profesores">
        PROFESORES
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="profesores-modificar" style="cursor:pointer">
        Modificar Profesores
      </div>
    </div>
    <!---->
    <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#myAccordion">
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


  <div class="visible" id="pan_grados">

  <!--<div class="grados-panel-up"><div class="text-left"><h3>Lista de grados de la Institucion </h3></div><div class="text-right"></div></div>-->

    <div class="panel-up"><div class="text-left"><h3>Lista de cursos por sección </h3></div><div class="text-right"><div class="group-button"><div class="add-button" id="add-curso-up">AÑADIR CURSO</div></div></div></div>
    <!-- AGREGAR AREA -->
    
<!-- /AGREGAR AREA -->

    <div class="form-cursos-cursos" style="margin-top: 10px; display:none" id="panel-add-curso">
    <table class="table table-sm table-success">
    <thead>
    <tr>
      <th scope="col">GRADO</th>
      <th scope="col">SECCION</th>
      <th scope="col">CURSO</th>
      <th scope="col">PROFESOR</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <form method="POST" action="php_crud/cursos/subir_cursos.php" id="form-cursos">
  <tbody>
  <tr>
    <td>
    <select id="select_add_grado_curso" onchange="select_grado()">
  <option selected disabled>Selecciona una opción</option>
  <?php
require_once 'conexion_bd.php';
$consulta = "SELECT nombre_grado, cod_grado FROM grados";
        $resultado = mysqli_query($connection,$consulta);
        $datos = array();
        if(mysqli_num_rows($resultado) > 0){
          //$contador_id = 0;
            while($fila = mysqli_fetch_assoc($resultado)){
              echo "<option value='".$fila['cod_grado']."'>".$fila['nombre_grado']."</option>";
            }}

?>
  </select>
    </td>
    <td>
    <select id="secciones-cursos-mod">
    <option selected disabled>Selecciona una opción</option>
  </select>
    </td>
    <td>
        <input name="nombreCurso" id="nombre_curso_add">
    </td>
    <td>
    <select id="profesor-cursos-mod">
    <option selected disabled>Selecciona una opción</option>
    <?php
    require_once 'conexion_bd.php';
    $consulta = "SELECT dni_profesor, nombre, apellido FROM profesor";
        $resultado = mysqli_query($connection,$consulta);
        $datos = array();
        if(mysqli_num_rows($resultado) > 0){
          //$contador_id = 0;
            while($fila = mysqli_fetch_assoc($resultado)){
              echo "<option value='".$fila['dni_profesor']."'>".$fila['nombre']." ".$fila['apellido']."</option>";
            }}        

    ?>
  </select>
    </td>
    <td>
      
      <input name="grados" value="" type="hidden" id="input_cur_grado">
      <input name="secciones" value="" type="hidden" id="input_cur_secciones">
      <input name="profesor" value="" type="hidden" id="input_cur_profe">
      <input type='hidden' value="" name='nombre_seccion' id="input-nombre-seccion">
    <input type='hidden' value="" name='nombre_grado' id="input-nombre-grado">
    <input type='hidden' value="" name='nombre_curso' id="input-nombre-curso">
    <button type="button" class="btn btn-primary" style="margin-right: 10px;" onclick="comprobarForm()">GUARDAR</button><button type="button" class="btn btn-danger" onclick="descartar()"><img src='images/eliminar.png' height='25px'></button>
    </td>
</tr>
  </tbody>
  </form> <!-------------------------- ESTE ES EL FORM ------------------->
    </table>
    </div>

    <div class="alert alert-danger" role="alert" id="error-form1" style="display:none">
  Hay un error en el envío del formulario
</div>        

    <div class="form-cursos-cursos" style="margin-top: 20px;">
    <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">GRADO</th>
      <th scope="col">SECCION</th>
      <th scope="col">CURSO</th>
      <th scope="col">PROFESOR</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once 'conexion_bd.php';
    $query = "SELECT g.nombre_grado, c.nombre AS nombre_curso, p.nombre, p.apellido, s.nombre_seccion, c.cod_curso
          FROM cursos c
          JOIN secciones s ON c.cod_seccion = s.cod_seccion
          JOIN grados g ON s.cod_grado = g.cod_grado
          JOIN profesor p ON c.dni_profesor = p.dni_profesor";
            $resultado = mysqli_query($connection,$query);
            
            if(mysqli_num_rows($resultado) > 0){
              $contador_id = 0;
                while($fila = mysqli_fetch_assoc($resultado)){
                  
    echo "<tr>
    <td>".$fila['nombre_grado']."</th>
    <td>".$fila['nombre_seccion']."</td>
    <td>".$fila['nombre_curso']."</td>
    <td>".$fila['nombre']. " " .$fila['apellido']."</td>
    <td>
    <form method='POST' action='php_crud/cursos/eliminar.php'> 
    <input type='hidden' value=".$fila['cod_curso']." name='valor-eliminar'>
    <input type='hidden' value=".$fila['nombre_seccion']." name='nombre_seccion'>
    <input type='hidden' value=".$fila['nombre_grado']." name='nombre_grado'>
    <input type='hidden' value=".$fila['nombre_curso']." name='nombre_curso'>
    <button type='submit' class='btn btn-danger'><img src='images/eliminar.png' height='25px'></button></form>
    </td>
  </tr>";
                }}
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
   <?php
   $tablaSeccions = "SELECT * FROM secciones";
$resultadoSecciones = mysqli_query($connection, $tablaSeccions);

require_once 'conexion_bd.php';
echo "let tablaSecciones = [];";
echo "let grado;";
while($row = mysqli_fetch_assoc($resultadoSecciones)){
echo "grado = {cod_seccion:'".$row['cod_seccion']."', nombre_seccion:'".$row['nombre_seccion']."', cod_grado:'".$row['cod_grado']."'};
tablaSecciones.push(grado);";
}
?>

function select_grado(){
let grados = document.getElementById('select_add_grado_curso').value;
console.log(grados);
let select = document.getElementById('secciones-cursos-mod');
select.innerHTML = '';
let initialOption = document.createElement('option');
initialOption.selected = true;
initialOption.disabled = true;
initialOption.textContent = 'Selecciona una opción';
select.appendChild(initialOption);

for (let index = 0; index < tablaSecciones.length; index++) {
 if(grados == tablaSecciones[index].cod_grado){
  let option = document.createElement('option');
     option.value = tablaSecciones[index].cod_seccion;
     option.text = tablaSecciones[index].nombre_seccion;
     console.log(option.text);
     select.appendChild(option);
 }
}
}

function comprobarForm(){
  //Vamos a comprobar si hay espacios vacíos, si no hay, enviamos en form
  let select_grado = document.getElementById("select_add_grado_curso");
  let select_seccion = document.getElementById("secciones-cursos-mod");
  let input_curso_add = document.getElementById("nombre_curso_add");
  let select_profe = document.getElementById("profesor-cursos-mod");
  let form = document.getElementById("form-cursos");
  if(select_grado.selectedIndex == -1 || select_seccion.selectedIndex == -1 || input_curso_add.value == "" || select_profe.selectedIndex == -1){//Comprobamos
  //No se puede
  document.getElementById("error-form1").style.display = "block";
  setTimeout(3000, ()=>{
    document.getElementById("error-form1").style.display = "none"; 
  });  
  }else{
    //Está lista para mandar
    document.getElementById("input_cur_grado").value = select_grado.value;
    document.getElementById("input_cur_secciones").value = select_seccion.value;
    document.getElementById("input_cur_profe").value = select_profe.value;
    document.getElementById("input-nombre-grado").value = select_grado;
    document.getElementById("input-nombre-seccion").value = select_seccion;
    document.getElementById("input-nombre-curso").value = document.getElementById("nombre_curso_add").value;
    form.submit();
  }
}
document.getElementById("add-curso-up").addEventListener('click',()=>{
document.getElementById("panel-add-curso").style.display = "block";
});
function descartar(){
  document.getElementById("panel-add-curso").style.display = "none";
}
    </script>
  </body>
</html>
