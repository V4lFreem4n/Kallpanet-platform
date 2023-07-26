<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Kallpanet Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type="text/css" media="screen" href="css/loginKallpanet_vcf.css">
    <link rel='stylesheet' type="text/css" media="screen" href="css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
     <!--<script src='main.js'></script>-->
</head>
<body>
    <div class="fondo" id="fondo">
        <div class="fondo-login" id="fondo-login">
            <div class="row d-flex align-items-center">
                <div class="col-12 mx-auto">
                    <img id="logo_png" src="images/logo_kallpanet.png" class="img-fluid mx-auto d-block">
                </div>
            </div>
            <div class="string_iniSesion">
                <div class="row d-flex align-items-center">
                    <div class="col-12 mx-auto text-center">
                        <h2 id="string_iniSesion_text" class="mx-auto d-block">
                            Iniciar Sesión
                        </h2>
                    </div>
                </div>
            </div>
            
            <div class="string_descripcion">
                <div class="row d-flex align-items-center">
                    <div class="col-12 mx-auto text-center">
                        <h3 id="string_descripcion_text" class="mx-auto d-block">
                            Ingresa tus datos para ingresar a la plataforma
                        </h3>
                    </div>
                </div>
            </div>

            <form action="validar_login.php" method="POST"> 
            <div class="d-flex justify-content-center mt-4">
                <div class="input-group w-75">
                    <div class="input-group-text bg-info">
                        <img src="images/usuario.png" alt="username-icon" style="height: 1rem">
                    </div>
                    <input class="form-control bg-light" type="text" placeholder="Username" id="userInput" name="usuario"><i class="fa fa-user-circle" aria-hidden="true"></i>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-1">
                <div class="input-group w-75">
                    <div class="input-group-text bg-info">
                        <img src="images/contraseña.png" alt="password-icon" style="height: 1rem">
                    </div>
                    <input class="form-control bg-light" type="password" placeholder="Password" id="userPassword" name="contrasena">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-1">
                <div class="w-75">
                    <button type="submit" class="btn btn-primary w-100 mt-3" id="buttonIniciar">Iniciar Sesión</button>
                </div>
            </div>
            </form>
            <div class="d-flex justify-content-center mt-1">
                <div class="w-75">
                    <div class="danger" id="danger"></div>
                </div>
            </div>
            
        </div>
     </div>
    
</body>
<script>
    const lienzo = document.getElementById("fondo-login");
    const anchoLienzo = lienzo.offsetWidth;
    const alturaLienzo = lienzo.offsetHeight;
    console.log("ALTURA : " + alturaLienzo +" | ANCHO : " + anchoLienzo);
</script>

<script src="js/loginKallpanet_vcf.js"></script>
</html>