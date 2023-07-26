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
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
       ALUMNOS
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse show " aria-labelledby="headingFour" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="alumnos-modificar" style="background:#F0FFFF;color:black;cursor:pointer">
        Modificar Alumnos
      </div>
    </div>
    <!---->
    <div id="collapseFour" class="accordion-collapse show " aria-labelledby="headingFour" data-bs-parent="#myAccordion">
      <div class="accordion-body" id="alumnos-actividad" style="cursor:pointer">
        Ver Actividad
      </div>
    </div>
  </div>
</div>
</div>
<div class="salir" id="cerrar_sesion">SALIR</div>
    </div>
<div class="pan-right" id="pan-right">
  <div class="container">
  

  <div class="visible" id="pan_grados">

  <!--<div class="grados-panel-up"><div class="text-left"><h3>Lista de grados de la Institucion </h3></div><div class="text-right"></div></div>-->
    <div id="error-extension-csv" style="display: none;">
    <div class="alert alert-warning" role="alert">
                      ¡El archivo seleccionado no es compatible! Asegúrese de que tenga la extensión ".csv"
                      </div>
    </div>

    <div class="error-alumnos-empty" id="error-alumnos-empty" style="display:none">
    <div class="alert alert-warning" role="alert">
                      ¡Complete todos los campos!
                      </div>
    </div>
    <div class="panel-up"><div class="text-left"><h3>Lista de Alumnos </h3></div><div class="text-right"><div class="add-button" id="add-alumnos">AÑADIR ALUMNOS</div></div></div>
    
    <div class="input-alumnos" id="input-alumnos-add" style="background: rgb(226,240,217);display:none; padding:10px; margin-top: 10px">
        <div class="alumnos-row-1" style="display: flex;margin-top:10px;">
            <h6>FILTRAR POR GRADO</h6>
            <select onchange="gradoSelected()" id="grado-ele-add">
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
            <h6 style="margin-left: 10px;">FILTRAR POR SECCION</h6>
  <select id="seccion-ele-add">
  <option selected disabled>Selecciona una opción</option>
  </select>
        </div>
        <div class="alumnos-row-2" style="display: flex;margin-top:10px;">
            <h6>Subir archivo CSV, el formato será <strong>DNI - NOMBRE - APELLIDO - USUARIO - CONTRASEÑA
</strong></h6>
        </div>
        <div class="alumnos-row-3" style="margin-top: 10px; display:flex">
    <div class="subir-csv-alumnos">
        <form action="php_crud/alumnos/subir_alumnos.php" method="POST" enctype="multipart/form-data" id="formulario-add-csv">
        <input type="file" id="input" name="archivo_csv" accept=".csv"><br>
        <input type="hidden" value="" name="cod-seccion" id="cod-seccion">
        <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="subir()">SUBIR</button>
        </form>
    </div>

<!--------SUBIMOS EL EXCEL--------->
    <script>

function mostrarAlerta() {
  document.getElementById("error-alumnos-empty").style.display = "block";
  setTimeout(function() {
    document.getElementById("error-alumnos-empty").style.display = "none";  
  }, 3000);
}

function subir(){
  if(document.getElementById("grado-ele-add").value !== -1 && document.getElementById("seccion-ele-add").value !== -1 && 
  document.getElementById("grado-ele-add").value !== "Selecciona una opción" && document.getElementById("seccion-ele-add").value !== "Selecciona una opción" &&
  (document.getElementById("input").files.length > 0)){

    document.getElementById("cod-seccion").value = document.getElementById("seccion-ele-add").value;
    document.getElementById("formulario-add-csv").submit(); 
  }else{
    mostrarAlerta();
  }
}


    </script>
<!--------------------------------->

    <div class="buttons-alumnos" style="margin-left: auto;">
        
        <button type="button" class="btn btn-danger" onclick="close_add()">DESCARTAR</button>
    </div>
</div>
    </div>

    <div class="filtrar-alumnos" style="display: flex; margin-top:10px; margin-bottom:10px">
  <div class="filtrar" style="display: flex; align-items: center;">
    <div class="filtrar-1">
      <h6 style="margin-left: 10px;">FILTRAR POR GRADO</h6>
      <select id="filtrar-grado" onchange="gradoFiltrado()">
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
      <h6 style="margin-left: 10px;">FILTRAR POR SECCION</h6>
      <select id="filtrar-seccion">
        <option selected disabled>Selecciona una opción</option>
        
      </select>
    </div>
    <button type="button" class="btn btn-warning" style="margin-left: 10px;" onclick="filtrarAlumnos()">FILTRAR</button>
  </div>
  <div class="acciones-lote" style="display:flex; align-items: center;margin-left: auto;">
    <h6 style="margin-left: 10px; margin-right:10px">ACCIONES POR LOTE</h6>
    <select id="acciones-lote">
      <option selected disabled>Selecciona una opción</option>
      <option value="eliminar">Eliminar</option>
       
    </select>
    <button type="button" class="btn btn-success" style="margin-left: 10px;" onclick="accionesLote()">EJECUTAR</button>
  </div>
</div>


    <div class="form-alumnos-table">

        <table class="table" id="table">
          <thead>
            <tr>
              <th>DNI</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>GRADO</th>
              <th>SECCION</th>
              <th>USUARIO</th>
              <th>CONTRASEÑA</th>
              <th class="text-end">ACCION</th>
            </tr>
          </thead>
          <tbody>
          <?php
            //ACÁ HAREMOS UN FOR EACH POR CADA GRADO QUE HAYA EN EL ARRAY
            //HACEMOS ACÁ MISMO LA CONSULTA A LA BASE DE DATOS DE LOS GRADOS
            require_once 'conexion_bd.php';

            $consulta = "SELECT a.dni_alumno, a.nombre, a.apellido, s.nombre_seccion,s.cod_seccion ,g.cod_grado , g.nombre_grado, a.usuario, a.contrasena
            FROM alumnos a
            JOIN secciones s ON a.cod_seccion = s.cod_seccion
            JOIN grados g ON s.cod_grado = g.cod_grado";


            $resultado = mysqli_query($connection,$consulta);
            $datos = array(); 
            if(mysqli_num_rows($resultado) > 0){
              $contador_id = 0;
                while($fila = mysqli_fetch_assoc($resultado)){
                    $datos = $fila;
                    
                    echo '<tr style="display:table-row" id="fila_'.$contador_id.'" data_grado="'.$fila['cod_grado'].'" data_seccion="'.$fila['cod_seccion'].'">
                          <form action="php_crud/alumnos/eliminar.php" method="POST" >
                          <td scope="row">'.$fila['dni_alumno'].'</td>
                          <td scope="row">'.$fila['nombre'].'</td>
                          <td scope="row">'.$fila['apellido'].'</td>
                          <td scope="row">'.$fila['nombre_grado'].'</td>
                          <td scope="row">'.$fila['nombre_seccion'].'</td>
                          <td scope="row">'.$fila['usuario'].'</td>
                          <td scope="row"><div style="display:flex"><div style="margin-right:10px" id="ocultar_mostrar_'.$contador_id.'"><img id="imagen_mostrar_'.$contador_id.'" src="images/invisible.png" style="width:20px; height:20px"></div><p id="contrasena_'.$contador_id.'">'.$fila['contrasena'].'</p></div></td>
                          <input type="hidden" name="valor_eliminar" value="'.$fila['dni_alumno'].'">
                          <td class="text-end">
                          <button style="margin-left:10px" type="submit" class="btn btn-danger"><img src="images/eliminar.png" height="25px"></button></td>
                          </form>
                          </tr>
                          '; //Acá relacionas el id con 
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

function gradoSelected(){
let grados = document.getElementById('grado-ele-add').value;
console.log(grados);
let select = document.getElementById('seccion-ele-add');
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

function gradoFiltrado(){
let grados = document.getElementById('filtrar-grado').value;
console.log(grados);
let select = document.getElementById('filtrar-seccion');
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

document.getElementById("add-alumnos").addEventListener('click', ()=>{
document.getElementById("input-alumnos-add").style.display = "block";
});

function close_add(){
document.getElementById("input-alumnos-add").style.display = "none";
}

function accionesLote() {
  var select = document.getElementById("acciones-lote");
  var checkboxesMarcados = [];
  var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
  
  if (select.value !== "-1") {
    checkboxes.forEach(function(checkbox) {
      checkboxesMarcados.push(checkbox.value);
    });
  }

  console.log(checkboxesMarcados);
}

function filtrarAlumnos(){
let grado = document.getElementById("filtrar-grado").value;
let seccion = document.getElementById("filtrar-seccion").value;


if(grado !== -1 && seccion !== -1 && grado !== "Selecciona una opción" && seccion !== "Selecciona una opción"){
  var tabla = document.getElementById('table');
  var filas = tabla.getElementsByTagName('tr');

  // Iterar sobre cada fila
  for (var i = 0; i < filas.length; i++) {
    var fila = filas[i];
    if(fila.getAttribute("data_grado") == grado && fila.getAttribute("data_seccion") == seccion){
      fila.style.display = "table-row";
    }else{
      //Aka ocultamos los tr
      fila.style.display = "none";
    }
  }
}

}

//Por defecto vamos a ocultar todos las contrasenañas
let array_contrasenas = [];

var tabla = document.getElementById('table');
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

//Vamos a hacer que aparezca y desapareza la contraseña cada vez que se pulsa


</script>
  </body>
  
</html>
