<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="assets/css/bootstrap-personalizado-3.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700&display=swap" rel="stylesheet">
        
</head>

<body>
    <div class="container" id="principal">
        <div class="row mt-5">
            <div class="col-lg-5 col-sm-12 mx-auto my-auto">
                <img src="assets/img/undraw_researching_22gp.png" id="avatar" class="animated bounceInLeft">
                <div class="card animated flipInX" id="card-box">
                    <div class="card-header bg-primary">
                        <br>
                        <br>
                        <h4 class="text-white text-center">Bienvenido al Sistema</h4>
                    </div>
                    <div class="card-body bg-dark">
                        <br>
                        <center>
                            <input type="button" id="btn-login" class="btn btn-success" value="Iniciar Sesion">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--Contenedor para loguearse-->
    <div id="contenedor-email" class="container animated jackInTheBox" style="display:none;">
        <div class="row mt-5">
            <div class="col-md-6 col-sm-12 mx-auto">
                <img src="assets/img/email.png" id="avatar2">
                <div class="card">
                    <div class="card-header bg-primary">
                        <br>
                        <br>
                        <h4 class="text-white text-center">Correo Electronico</h4>
                    </div>
                    <div class="card-body bg-dark">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite Su Correo Electronico">
                        </div>
                        <div class="form-group">
                            <input type="button" id="btn-next" value="Verificar Correo" class="btn btn-success btn-block">
                        </div>
                    </div>
                    <div class="card-footer bg-dark" id="respuesta">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contenedor-password" class="container animated flipInY" style="display:none;">
        <div class="row mt-5">
            <div class="col-md-5 col-sm-12 mx-auto">
                <img src="assets/img/pass.png" id="avatar3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <br><br>
                        <h4 class="text-white text-center">Digite Contraseña</h4>
                    </div>
                    <div class="card-body bg-dark">
                        <div class="form-group">
                            <input type="password" id="password" class="form-control" placeholder="Digite Su Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="button" id="btn-ok" value="Verificar Clave" class="btn btn-success btn-block">
                        </div>
                    </div>
                    <div class="card-footer bg-dark" id="respuesta2">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/controller.js"></script>
</body>

</html>