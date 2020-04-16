<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App De Telefonia</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700&display=swap" rel="stylesheet">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php include('partials/header/header.php');?>
    <br><br><br><br>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card bg-dark">
                        <div class="card-header bg-primary">
                            <h4 class="text-center text-white">
                                Fotografia Empleado
                            </h4>
                        </div>
                        <div class="card-body">
                            <img src="assets/img/undraw_male_avatar_323b.png" class="img-fluid" alt="">
                        </div>
                        <div class="card-footer">
                            <input type="button" id="cambiar-fotografia" class="btn btn-success btn-block"value="Cambiar Fotografia">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary">
                        <h4 class="text-white text-center">Datos Empleado</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h6 class="text-white">Nombre</h5>
                            <p class="text-white text-center">Bryan Ariel</p>
                            <h6 class="text-white">Apellido</h5>
                            <p class="text-white text-center">Sanchez Anariba</p>
                            <h6 class="text-white">Correo</h5>
                            <p class="text-white text-center">saariel115@gmail.com</p>
                            <h6 class="text-white">Cargo</h6>
                            <p class="text-white text-center">Full Stack MEAN Developer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary">
                        <h4 class="text-white text-center">Cerrar Sesion</h4>
                    </div>
                    <div class="card-body">
                        <input type="button" class="btn btn-danger btn-block" value="Cerrar Sesion">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('partials/footer/footer.php');?>
    <script src="assets/js/jquery.min.css"></script>
    <script src="https://kit.fontawesome.com/a8b47806ff.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>