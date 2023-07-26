<html>
<body>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Pacifico&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/loginKallpanet_vcf.css">

<?php
    session_start();
    ?>
<div class="contenedor-profesores">

</div>



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
    <div class="panel-derecha" style="padding: 20px;">
    <div class="background"></div>
      <div class="container">  
        <div class="row">
        <!---->
          <?php  

          require_once 'conexion_bd.php';
          $dni = $_SESSION['dni_profesor'];
          $consulta = "SELECT cod_curso,	nombre,	area,	dni_profesor,	cod_seccion	FROM cursos WHERE dni_profesor = '$dni'";
          $resultado = mysqli_query($connection,$consulta);
          $datos = array();
          if(mysqli_num_rows($resultado) > 0){
            $contador_id = 0;
              while($fila = mysqli_fetch_assoc($resultado)){
                  

                  echo "<div class='card' style='width: 14rem; margin-left:20px; margin-top:20px'>
                  <img class='card-img-top' src='images/libro.png' alt='Card image cap'>
                  <div class='card-body'>
                  <h5 class='card-title'>".$fila['nombre']."</h5>
                  <a href='http://localhost/kallpanet-profesores/profesores.php?codigo=".$fila['cod_curso']."' class='btn btn-primary'>Gestionar curso</a>
                  </div>
                  </div>";

              }}

          ?>
      <!---->
    </div>
    </div>
   </div>
  

</html>
</body>
<style>
.contenedor{
  height: 100%;
  width: 100%;
  position: absolute;
}

  .panel-arriba{
    width: 100%;
    height: 80px;
    background:rgb(157, 195, 230);
    display: flex;
  }

  .panel-abajo{
  position: absolute;
  display: flex;
  width: 100%;
  height: calc(100% - 80px);  
  }

  .panel-izquierda{
    overflow: auto;
    width: 200px;
    height: 100%;
    background:rgb(227, 226, 226);
  }

  .panel-derecha{
    width: calc(100% -200px);
    height: 100%;
    
  }

  .card-curso{
    height: 200px;
    width: 300px;
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
  .background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background-image: url('images/fondo.webp');
  background-size: cover; /* Ajusta el tamaño de la imagen para cubrir todo el div */
  background-repeat: no-repeat; /* Evita que la imagen se repita */
  opacity: .1;
}

</style>
<script>

document.getElementById("btn-1").addEventListener('click', ()=>{
  window.location.href = "http://localhost/kallpanet-profesores/profesores-admin.php";
});

document.getElementById("btn-2").addEventListener('click', () => {
      window.location.href = "http://localhost/kallpanet-profesores/ayuda.php";
    });
    

  document.getElementById("salir").addEventListener("click", function() {
    fetch("cerrar_sesion.php", {
      method: "POST"
    })
    .then(function(response) {
      if (response.ok) {
        // Redirecciona al usuario a una página de inicio de sesión u otra página relevante
        window.location.href = "http://localhost/kallpanet-profesores/login.php";
      } else {
        console.log("Error al cerrar sesión");
      }
    })
    .catch(function(error) {
      console.log("Error de red: " + error);
    });
  });
</script>
</head>
