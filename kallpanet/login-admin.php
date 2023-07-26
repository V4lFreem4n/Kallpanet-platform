<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <?php
    //require_once 'php_configuration/conexion_bd.php';
    require_once 'validar_login.php';
    ?>
</head>
<body>
    <section class="vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(to bottom right, rgb(59,156,159), rgb(92,225,230), rgb(193,255,114));">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <!-- Resto del contenido del card -->
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="images/fondo-login-admin.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 540px;width: 400px;">
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black" style="padding: 0;">
                                        <div class="d-flex flex-column align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <div class="text-center">
                                                <img src="images/logo2.png" style="width: 150px;">
                                            </div>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresa tus datos</h5>
                                        <form action="validar_login.php" method="POST">
                                            <div class="form-outline mb-4">
                                                <input id="form2Example17" class="form-control form-control-lg" name="usuario">
                                                <label class="form-label" for="form2Example17">Correo de Usuario</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example27" class="form-control form-control-lg" name="contrasena">
                                                <label class="form-label" for="form2Example27">Contraseña</label>
                                            </div>
                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit">ENTRAR</button>
                                                <?php if (isset($_GET['error'])){
                                                    echo "<div class='alert alert-danger' role='alert'>".$_GET['error']."</div>";
                                                } ?>
                                                
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>

</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


