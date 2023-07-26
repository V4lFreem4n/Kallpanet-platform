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
<div class="accordion" id="acordeon1">

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        TABLERO
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#acordeon1">
      <div class="accordion-body" id="tickets">
        Tickets
      </div>
    </div>
     
     
  </div>
</div>

<!--fin - acordeon-->
</div>
<h7 style="color:rgb(111,111,111); margin-top:25px;">SISTEMA</h7>
<div class="grados-pan" id="btn_grados" style="background:#F0FFFF;color:black">
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
      <div class="accordion-body" id="profesores-modificar"style="cursor:pointer">
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

    <div class="panel-up"><div class="text-left"><h3>Lista de grados de la Institucion </h3></div><div class="text-right"><div class="add-button" id="add-grado">AÑADIR GRADO</div></div></div>
    <div id="panel-add-up" style="display: none;">
    <form action="php_crud/agregar_grado.php" method="POST">
    <div class="form-grados-panel-up" style="display: flex;background: rgb(226, 240, 217);"><div class="text-in-left"><h5 class="">NOMBRE DEL GRADO </h5><input id="input-grados" class="form-control" style="margin-left:20px" name="input-grado"></div><div class="text-in-right" style="margin-left: auto;"><button type="submit" class="btn btn-primary" style="margin-right: 10px;" >GUARDAR</button><button type="button" class="btn btn-danger" id="descartar-add-grado">DESCARTAR</button></div></div>
    </form>
    </div>
    <?php if (isset($_GET['error'])){
    echo "<div class='alert alert-danger' style='margin-top:10px;' role='alert'>".$_GET['error']."</div>";}
     
     ?>
    

    <div class="form-grados-table">

        <table class="table">
          <thead>
            <tr>
              <th>GRADO</th>
              <th class="text-end">ACCION</th>
            </tr>
          </thead>
          <tbody>

            <?php
            //ACÁ HAREMOS UN FOR EACH POR CADA GRADO QUE HAYA EN EL ARRAY
            //HACEMOS ACÁ MISMO LA CONSULTA A LA BASE DE DATOS DE LOS GRADOS
            require_once 'conexion_bd.php';
            $consulta = "SELECT nombre_grado FROM grados";
            $resultado = mysqli_query($connection,$consulta);
            $datos = array();
            if(mysqli_num_rows($resultado) > 0){
              $contador_id = 0;
                while($fila = mysqli_fetch_assoc($resultado)){
                    $datos = $fila;
                    $grados = $fila['nombre_grado'];
                    echo '<tr>
                          <form action="php_crud/grados/eliminar.php" method="POST">
                          <td scope="row" id="nombre_grado_'.$contador_id.'">'.$grados.'</td>
                          <input type="hidden" name="valor_eliminar" value="'.$grados.'">
                          <td class="text-end"><button type="submit" class="btn btn-danger" id="eliminar_grado_'.$contador_id.'" onclick="eliminar_grado('.$contador_id.')"><img src="images/eliminar.png" height="25px"></button></td>
                          </form>
                          </tr>'; //Acá relacionas el id con 
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
    <script src="js/grados.js"></script>
  </body>
</html>
