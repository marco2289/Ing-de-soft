<?php
session_start();
require('./php-connect-db/db-connection.php');
if (isset($_SESSION['USER_ID'])) {
    $id = $_SESSION['USER_ID'];
    $nombres = '';
    $apellidos = '';
    $correo = '';
    $fotografia = '';
    $cargo = '';
    $sql = "SELECT A.ID_PERSONA ,A.NOMBRE_PERSONA ,A.APELLIDO_PERSONA ,B.CORREO_EMPLEADO ,B.FOTOGRAFIA_EMPLEADO ,C.DESCRIPCION_CARGO_EMPLEADO FROM tbl_personas A LEFT JOIN tbl_empleados B ON (A.ID_PERSONA = B.ID_EMPLEADO) LEFT JOIN tbl_cargo_empleado C ON (B.ID_CARGO_EMPLEADO = C.ID_CARGO_EMPLEADO) WHERE ID_PERSONA = $id";
    $resultados = mysqli_query($conexion, $sql);
    while (($row = mysqli_fetch_array($resultados, MYSQLI_ASSOC))) {
        $nombres = $row['NOMBRE_PERSONA'];
        $apellidos = $row['APELLIDO_PERSONA'];
        $correo = $row['CORREO_EMPLEADO'];
        $fotografia = $row['FOTOGRAFIA_EMPLEADO'];
        $cargo = $row['DESCRIPCION_CARGO_EMPLEADO'];
    }
} else {
    $nombres = "No existe la var sesion";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App De Telefonia</title>
    <!--link rel="stylesheet" href="assets/css/animate.css"-->
    <link rel="stylesheet" href="assets/css/bootstrap-personalizado-3.min.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap-personalizado-3.min.css">
    <style>
        /*No Quitar por que rompe la maquetacion*/
        /*Foto*/
        .card {
            margin: 10px 0 0px 0;
            background-color: rgba(214, 224, 226, 0.2);
            border-top-width: 0;
            border-bottom-width: 2px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card .card-heading {
            padding: 0 20px;
            margin: 0;
            margin-bottom: 15px;
        }

        .card .card-heading.simple {
            font-size: 20px;
            font-weight: 300;
            color: #777;
            border-bottom: 1px solid #e5e5e5;
        }

        .card .card-heading.image img {
            display: inline-block;
            width: 46px;
            height: 46px;
            margin-right: 15px;
            vertical-align: top;
            border: 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .card .card-heading.image .card-heading-header {
            display: inline-block;
            vertical-align: top;
        }

        .card .card-heading.image .card-heading-header h3 {
            margin: 0;
            font-size: 14px;
            line-height: 16px;
            color: #262626;
        }

        .card .card-heading.image .card-heading-header span {
            font-size: 12px;
            color: #999999;
        }

        .card .card-body {
            padding: 0 20px;
            margin-top: 0px;
        }

        .card .card-media {
            padding: 0 20px;
            margin: 0 -14px;
        }

        .card .card-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .card .card-actions {
            min-height: 30px;
            padding: 0 20px 20px 20px;
            margin: 20px 0 0 0;
        }

        .card .card-comments {
            padding: 20px;
            margin: 0;
            background-color: #f8f8f8;
        }

        .card .card-comments .comments-collapse-toggle {
            padding: 0;
            margin: 0 20px 12px 20px;
        }

        .card .card-comments .comments-collapse-toggle a,
        .card .card-comments .comments-collapse-toggle span {
            padding-right: 5px;
            overflow: hidden;
            font-size: 12px;
            color: #999;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card-comments .media-heading {
            font-size: 13px;
            font-weight: bold;
        }

        .card.people {
            position: relative;
            display: inline-block;
            width: 170px;
            height: 300px;
            padding-top: 0;
            margin-left: 20px;
            overflow: hidden;
            vertical-align: top;
        }

        .card.people:first-child {
            margin-left: 0;
        }

        .card.people .card-top {
            position: absolute;
            top: 0;
            left: 0;
            display: inline-block;
            width: 170px;
            height: 150px;
            background-color: #ffffff;
        }

        .card.people .card-top.green {
            background-color: #53a93f;
        }

        .card.people .card-top.blue {
            background-color: #427fed;
        }

        .card.people .card-info {
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 100%;
            height: 101px;
            overflow: hidden;
            background: #ffffff;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.people .card-info .title {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            color: #404040;
        }

        .card.people .card-info .desc {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 12px;
            line-height: 16px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.people .card-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            line-height: 29px;
            text-align: center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.hovercard {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            text-align: center;
            background-color: rgba(214, 224, 226, 0.2);
        }

        .card.hovercard .cardheader {
            background: url("assets/img/escritorio-modelo-shiro-2-cajones-1-puerta-color-blanco-brillo.jpg");
            background-size: cover;
            height: 135px;
        }

        .card.hovercard .avatar {
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .card.hovercard .avatar img {
            width: 100px;
            height: 100px;
            max-width: 100px;
            max-height: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.5);
        }

        .card.hovercard .info {
            padding: 4px 8px 10px;
        }

        .card.hovercard .info .title {
            margin-bottom: 4px;
            font-size: 24px;
            line-height: 1;
            color: #262626;
            vertical-align: middle;
        }

        .card.hovercard .info .desc {
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.hovercard {
            padding: 5px 20px;
            margin-bottom: 17px;
        }
    </style>
</head>

<body style="font-family: 'Roboto', ;">
    <?php
    if (isset($_SESSION['STATUS'])) :
    ?>
        <?php include('partials/header/header.php'); ?>
        <br><br>
        <div class="container-fluid efecto2" id="contenedor-inicial">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header" style="background: #212121;">
                            <h2 class="text-center" style="color:#FFC312;">
                                Datos Personales del Empleado
                            </h2>
                        </div>
                        <div class="card-body jumbotrom efecto3" style="background:#FAFAFA;">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 my-auto">
                                        <div class="card hovercard" >
                                            <div class="cardheader">

                                            </div>
                                            <div class="avatar">
                                                <img alt="" src="Ing-de-soft/img/<?php echo $fotografia; ?>" class="img-fluid">
                                            </div>
                                            <div class="info">
                                                <div class="title">
                                                    <strong><?php echo $nombres . " " .  $apellidos; ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">
                                            <img src="assets/img/galeria.png" alt=""> Añadir Fotografia
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">Formulario Para Añadir Una Fotografia</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span> </button>
                                                    </div>
                                                    <div class="" style="background-color:white;">
                                                        <center>
                                                            <form method="POST" id="formulario" enctype="multipart/form-data">
                                                                <h4 class="text-white text-center"><b>Subir Imagen:</b></h4>
                                                                <input type="file" name="imagen" id="imagen" class="btn btn-success"><br><br>
                                                                <input type="button" value="Enviar Imagen" class="btn btn-success" id="btn-enviar">
                                                            </form><br>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir Sin Hacer Nada</button>
                                                        </center>
                                                    </div>
                                                    <div class="modal-footer bg-dark">
                                                        <!--button type="button" class="btn btn-danger" data-dismiss="modal">Salir Sin Hacer Nada</button-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-12 mx-auto">
                                        <div class="card" style="background:#FAFAFA; border: none;">
                                            <div class="card-header text-center"  style="background: #212121;">

                                                <button type="button" class="btn btn-info btn-block">
                                                    <img src="assets/img/llave.png" alt=""> Ver Promociones
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <hr style="border: 2px solid #FFC312;">
                                                <div class="row">

                                                    <div class="col">
                                                        <div class="form-group">
                                                        <p class=" text-center">
                                                            <img src="assets/img/user.png" width="50"><br>
                                                            <b style="font-size: 20px; color:#000;">
                                                                Nombres:
                                                            </b>
                                                                <?php echo $nombres; ?>
                                                        </p>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                        <p class=" text-center">
                                                            <img src="assets/img/user.png" width="50"><br>
                                                        <b style="font-size: 20px; color:#000;">
                                                            Apellidos:
                                                        </b>
                                                        <?php echo $apellidos; ?>
                                                    </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr style="border: 2px solid #FFC312;">
                                                <div class="row">

                                                    <div class="col">
                                                        <p class=" text-center">
                                                            <img src="assets/img/corre.png" width="50"><br>
                                                            <b style="font-size: 20px; color:#000;">Correo:
                                                            </b>
                                                            <?php echo $correo; ?>
                                                        </p>
                                                    </div>
                                                    <div class="col">
                                                        <p class=" text-center">
                                                            <img src="assets/img/cargo.png" width="50"><br>
                                                            <b style="font-size: 20px; color:#000;">Cargo:
                                                            </b>
                                                            <?php echo $cargo; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr style="border: 2px solid #FFC312;">
                                                <div class="card-header text-center"  style="background: #212121;">

                                                <button type="button" class="btn btn-info btn-block">
                                                    <img src="assets/img/urbano.png" width="24" alt=""> Ver Informacion Sucursales
                                                </button>
                                                <button type="button" class="btn btn-info btn-block">
                                                    <img src="assets/img/empleado.png" width="24" alt=""> Ver Informacion Gerentes
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"  style="background: #212121;">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="assets/js/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/a8b47806ff.js" crossorigin="anonymous"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/landing-controller.js"></script>

      
    <?php
    else :
        header('Location: page-not-found.php');
    ?>
    <?php
    endif;
    ?>
</body>

</html>
