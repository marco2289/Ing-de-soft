<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To Your App</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
                        <div class="form-group text-center text-white">
                            <input type="button" id="btn-login" class="btn btn-success" value="Iniciar Sesion">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contenedor para crear un nuevo usuario-->
    <div class="container animated jackInTheBox" id="contenedor-signup" style="display:none;">
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12 mx-auto">
            <img src="assets/img/product-input-fields.png" id="avatar4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <br><br>
                        <h4 class="text-white text-center">Rellene Los Siguientes Campos</h4>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <form>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" id="txt-identificacion" class="form-control" placeholder="Digite Numero de Identidad o Identificacion">
                                </div>
                                <div class="col">
                                    <input type="text" id="txt-nombre" class="form-control" placeholder="Digite su Nombre Completo">
                                </div>
                                <div class="col">
                                    <input type="text" id="txt-apellido" class="form-control" placeholder="Digite su Apellido Completo">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col form-group">
                                    <label for="txt-fecha-nac" class="form-control bg-dark text-white">Seleccione La Fecha de Nacimiento</label>
                                    <input type="date" id="txt-fecha-nac" class="form-control">
                                </div>
                                <div class="col form-group">
                                    <label for="txt-fecha-contrato" class="form-control bg-dark text-white">Seleccione La Fecha de Contrato</label>
                                    <input type="date" id="txt-fecha-contrato" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <select name="" id="option-genero" class="form-control">
                                        <option value="#">Seleccione Genero</option>
                                        <option value="1">Femenino</option>
                                        <option value="2">Masculino</option>
                                        <option value="3">Otro</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="opcion-est-civil" class="form-control">
                                        <option value="#">Seleccione Estado Civil</option>
                                        <option value="1">Soltero</option>
                                        <option value="2">Casado</option>
                                        <option value="3">Divorciado</option>
                                        <option value="4">Viudo</option>
                                        <option value="5">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" id="txt-telefono" class="form-control" placeholder="Digite Su Numero de Telefono">
                                </div>
                                <div class="col">
                                    <input type="text" id="txt-cel" class="form-control" placeholder="Digite Su Numero de Celular">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" id="txt-direccion" class="form-control" placeholder="Digite El Lugar De Residencia del Empleado">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <select name="" id="sucursal-option" class="form-control">
                                        <option value="#">Seleccione La Sucursal De Trabajo</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="titulacion-option" class="form-control">
                                        <option value="#">Seleccione La titulacion De Trabajo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="email" id="txt-email" class="form-control" placeholder="Digite El Correo Electronico">
                                </div>
                                <div class="col">
                                    <input type="password" id="txt-password" class="form-control" placeholder="Digite La Contraseña">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col my-auto">
                                    <label for="txt-obs" class="bg-dark form-control text-white text-center text-bolder">
                                        Observaciones Sobre El Empleado
                                    </label>
                                </div>
                                <div class="col">
                                    <textarea name="" id="txt-obs" cols="30" rows="4" class="form-control">
                                    
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="button" id="btn-send-information" class="btn btn-success btn-block" value="Guardar Informacion Del Empleado">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contenedor para loguearse-->
    <div id="contenedor-email" class="container animated jackInTheBox" style="display:none;">
        <div class="row mt-5">
            <div class="col-md-5 col-sm-12 mx-auto">
                <img src="assets/img/email.png" id="avatar2">
                <div class="card">
                    <div class="card-header bg-primary">
                        <br>
                        <br>
                        <h4 class="text-white text-center">Correo Electronico</h4>
                    </div>
                    <div class="card-body bg-dark">
                        <div class="form-group">
                            <input type="email" id="email" class="form-control" placeholder="Digite Su Correo Electronico">
                        </div>
                        <div class="form-group">
                            <input type="button" id="btn-next" value="Next" class="btn btn-success btn-block">
                        </div>
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
                            <input type="email" id="password" class="form-control" placeholder="Digite Su Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="button" id="btn-ok" value="Next" class="btn btn-success btn-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/controller.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>