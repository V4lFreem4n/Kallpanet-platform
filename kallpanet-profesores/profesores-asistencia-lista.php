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

    <div class="contenedor">
      <div class="panel-arriba" style="padding: 5px;">
        <div class="imagen-profesor" style="border-radius: 50%;">
          <img src="images/profesor.png" style="width: 70px;">
        </div>
        <div class="datos-profesor">
          <h4><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></h4>
          <h4><?php echo $_SESSION['dni_profesor']; ?></h4>
        </div>
      </div>
      <div class="panel-abajo">
        <div class="panel-izquierda">
          <div class="btn-1" id="btn-1">
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

          <div class="contenido">
            <h2>CURSO 1</h2>
            <h4>Control Asistencia</h4>
            <p style="font-style: italic;">NOMBRE DE LA SESION</p>
            <div style="display: flex;">
            <p style="margin-right: 5px;">Creada el</p><strong>26/06/2023</strong><p style="margin-left: 5px; margin-right:5px">a las </p><strong>16:57</strong></div>
            
            <div style="width: 80%;">
            <table class="table ">
  
  <thead class="table-success">
      <tr>
      <th scope="col">DNI</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">ASISTENCIA</th>
      </tr>
  </thead>
  <tbody>
      <tr>
      <td>12312</td>
      <td>343</td>
      <td>343</td>
      <td>
      <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
  <label class="form-check-label" for="flexSwitchCheckDefault">No asistió | Si asistió</label>
</div>
      </td>
      </tr>
      </tbody>
  </table>

  <div style="display:flex">
<div style="margin-left: auto;"><button type="button" class="btn btn-primary" >PROCESAR</button></div>
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
    
    .panel-izquierda {
       
      left: 0;
      width: 200px;
      height: 100%;
      background: rgb(198, 220, 240);
    }
    
    
  
    
    .btn-1 {
      padding: 20px;
      height: 70px;
      margin-top: 30px;
      background: rgb(55, 134, 204);
    }
    
    .btn-1:hover {
      cursor: pointer;
      background: black;
      color: white;
    }
    
    .btn-salir {
      padding: 20px;
      height: 70px;
      margin-top: 30px;
      background: rgb(220, 30, 30);
    }
    
    .btn-salir:hover {
      cursor: pointer;
      background: black;
      color: white;
    }
    
    
    .menu-lateral {
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
        
      height: 100%;
      width: 100%;
      padding: 20px;
    
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

    document.getElementById("p1").addEventListener('click', () => {});
    document.getElementById("p2").addEventListener('click', () => {
      window.location.href ="http://localhost/kallpanet-profesores/profesores-cursos.php";
    });
    document.getElementById("p3").addEventListener('click', () => {
      window.location.href ="http://localhost/kallpanet-profesores/profesores-control-asistencia.php";
    });
    document.getElementById("p4").addEventListener('click', () => {
      window.location.href = "http://localhost/kallpanet-profesores/profesores-calificaciones.php";
    });
  </script>

</html>
