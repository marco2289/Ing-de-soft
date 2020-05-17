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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        .bg-dark {
            background: #212121 !important;
        }

        h1 , h2 , h3 , h4 , h5 , h6 {
            color: #fff !important;
        }
    </style>
</head>

<body style="font-family: 'Roboto', ;">
<?php
    if (isset($_SESSION['STATUS'])) :
?>
    <?php include('partials/header/header.php'); ?>
    <div class="container" id="configuraciones" style="display:block;">
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header" style="background: #212121;">
                        <h3 class="text-center" style="color:#212121;">
                            Menu De Opciones
                        </h3>
                    </div>
                    <div class="card-body" style="background:#FAFAFA;">
                        <div class="container">
                            <div class="row mt-5 mb-5">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/contrasena.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" id="btn-mostrar-cambio-clave" class="btn btn-info btn-block" value="Realizar Cambio de Clave">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/estado.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" id="btn-cambio-estatus-empleado" class="btn btn-info btn-block" value="Cambiar Estatus de Empleado">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/gmail.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" id="btn-mostrar-cambio-email" class="btn btn-info btn-block" value="Realizar Cambio de Correo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mt-5 mb-5">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/empleado.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" class="btn btn-info btn-block" id="btn-signup" value="Agregar Nuevo Empleado">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/seminario.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" id="btn-asignacion-privs" class="btn btn-info btn-block" value="Asignar Privilegios a Empleado">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/proveedor.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <a href="./proveedores.php" class="btn btn-info btn-block">Agregar nuevo proveedor</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mt-5 mb-5">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/inventario.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" class="btn btn-info btn-block" value="Revisar Inventario">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/alarma.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" class="btn btn-info btn-block" value="Notificaciones">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="card configuraciones-empleado" style="background: #212121;">
                                        <div class="card-header mx-auto" style="background: #212121;">
                                            <img src="assets/img/urbano.png" width="128">
                                        </div>
                                        <div class="card-body">
                                            <input type="button" id="btn-creacion-sucursales" class="btn btn-info btn-block" value="Agregar Nueva Sucursal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background: #212121;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Contenedor para crear un nuevo usuario-->
    <div class="container animated jackInTheBox" id="contenedor-signup" style="display:none;">
        <div class="row">
            <div class="col-lg-12 col-sm-12 mx-auto">
                <img src="assets/img/product-input-fields.png" id="avatar4">
                <div class="card">
                    <div class="card-header" style="background: #212121;">
                        <br><br>
                        <h2 class="text-center">Rellene Los Siguientes Campos</h2>
                    </div>
                    <div class="card-body" style="background:#FAFAFA;">
                        <form>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" id="txt-identificacion" class="form-control" placeholder="Digite Numero de Identidad o Identificacion">
                                </div>
                                <div class="col">
                                    <input type="text" id="txt-nombre" class="form-control" placeholder="Digite su Nombre Completo">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col my-auto form-group">
                                    <input type="text" id="txt-apellido" class="form-control" placeholder="Digite su Apellido Completo">
                                </div>
                                <div class="col form-group">
                                    <label for="txt-fecha-nac" class="form-control bg-dark text-white" >Seleccione La Fecha de Nacimiento</label>
                                    <input type="date" id="txt-fecha-nac" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <select name="" id="option-genero" class="form-control">
                                        
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="opcion-est-civil" class="form-control">
                                        
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
                                <div class="col">
                                    <select name="" id="cargo-option" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <select name="" id="sucursal-option" class="form-control">
                                        
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="titulacion-option" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="email" id="txt-email" class="form-control" placeholder="Digite El Correo Electronico">
                                </div>
                                <div class="col">
                                    <input type="email" id="txt-email-verif" class="form-control" placeholder="Repite El Correo Electronico">
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
                                    <input type="button" id="btn-send-information" class="btn btn-info btn-block" value="Guardar Informacion Del Empleado">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-dark" id="mostrar-credencial">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Contenedor para cambio de clave-->
    <div class="container" id="contenedor-cambiar-clave" style="display:none;">
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h2 class="text-warning text-center text-white">
                            Formulario de cambio de clave
                        </h2>
                    </div>
                    <div class="card-body" style="background: #FAFAFA;">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <b class="titulos-fuertes">Bienvenido(@): <?php echo $nombres; ?></b>
                                    <p class="parrafos-fuertes">Para proceder con el cambio de clave digite la siguiente informacion que acontinuacion se le pide</p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="clave-actual" class="form-control bg-dark text-white">Digite su clave actual: </label>
                                    <input type="password" id="clave-actual" class="form-control" placeholder="Clave Actual">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="clave-nueva" class="form-control bg-dark text-white">Digite su nueva clave: </label>
                                    <input type="password" id="clave-nueva" class="form-control" placeholder="Nueva Clave">
                                </div>
                                <div class="col">
                                    <label for="clave-nueva" class="form-control bg-dark text-white">Repita su nueva clave: </label>
                                    <input type="password" id="clave-nueva-repetida" class="form-control" placeholder="Repita Nueva Clave">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <input type="button" id="btn-guardar-cambios-pass" class="btn btn-info" value="Guardar Cambios">
                                </div>
                                <div class="col">
                                    <input type="button" id="btn-salir-sin-hacer-nada-pass" class="btn btn-danger" value="Salir sin hacer nada">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="respuesta-cambio-clave" class="card-footer bg-dark">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contenedor para cambio de clave-->
    <div class="container" id="contenedor-cambiar-email" style="display:none;">
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h2 class="text-warning text-center">
                            Formulario de cambio de email
                        </h2>
                    </div>
                    <div class="card-body" style="background: #FAFAFA;">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <b class="titulos-fuertes">Bienvenido(@): <?php echo $nombres; ?></b>
                                    <p class="parrafos-fuertes">Para proceder con el cambio de correo electronico digite la siguiente informacion que acontinuacion se le pide</p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="email-actual" class="form-control bg-dark text-white">Digite su correo electronico: </label>
                                    <input type="email" id="email-actual" class="form-control" placeholder="Correo electronico">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="email-nuevo" class="form-control bg-dark text-white">Digite su nuevo correo: </label>
                                    <input type="email" id="email-nuevo" class="form-control" placeholder="Correo electronico">
                                </div>
                                <div class="col">
                                    <label for="repite-email-nuevo" class="form-control bg-dark text-white">Repita nuevo correo: </label>
                                    <input type="email" id="repite-email-nuevo" class="form-control" placeholder="Repite Nuevo Correo">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <input type="button" id="btn-guardar-cambios-email" class="btn btn-info" value="Guardar Cambios">
                                </div>
                                <div class="col">
                                    <input type="button" id="btn-salir-sin-hacer-nada-email" class="btn btn-danger" value="Salir sin hacer nada">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cambio-email" class="card-footer bg-dark">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contenedor para cambio de estatus empleado-->
    <div class="container mt-4" id="contenedor-cambiar-estatus-empleado" style="display:none;">
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h2 class="text-warning text-center">
                            Formulario de cambio de estatus
                        </h2>
                    </div>
                    <div class="card-body" style="background: #FAFAFA;">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="identificador" class="form-control bg-dark text-white">Digite la Identificacion del empleado</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="txt-id-status" class="form-control" placeholder="Digite el id empleado">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" class="btn btn-info btn-block" id="btn-busqueda-emple" value="Buscar Empleado">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" id="btn-salir-sin-hacer-nada-estatus" class="btn btn-danger btn-block" value="Salir sin hacer nada">
                                    </div>
                                </div>
                                <div id="contenido-mostrar-estatus" class="col">
                                    
                                </div>
                            </div>
                            <div class="row mt-3 contenido-estatus-emp">
                                <div class="col">
                                    <div id="contenido-selects">
                                        <label for="sucursales-emple" class="form-control bg-dark text-white ">
                                            Seleccione Sucursal a Cambiar
                                        </label>
                                        <select name="" id="sucursales-emple" class="form-control mt-2">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="contenido-selects">
                                        <label for="estatus-emple" class="form-control bg-dark text-white">
                                            Seleccione Estatus Empleado a Cambiar
                                        </label>
                                        <select name="" id="estatus-emple" class="form-control mt-2">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <input type="hidden" id="id-emple-a-cambiar">
                                <div class="col">
                                    <div class="form-group">
                                    <input type="button" id="btn-guarda-cambios-estatus" class="btn btn-info btn-block" value="Guardar Cambios">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="respuesta-estatus-empleado" class="card-footer bg-dark">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contenedor para asignar privilegios a empleado-->
    <div class="container" id="contenedor-privilegios" style="display:none;">
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h2 class="text-warning text-center">
                            Formulario de asignacion de privilegios
                        </h2>
                    </div>
                    <div class="card-body" style="background: #FAFAFA;">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="identificador" class="form-control bg-dark text-white">Digite la Identificacion del empleado</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="txt-id-privs" class="form-control" placeholder="Digite el id empleado">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" class="btn btn-info btn-block" id="btn-busqueda-empleados" value="Buscar Empleado">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" id="btn-salir-sin-hacer-nada-privs" class="btn btn-danger btn-block" value="Salir sin hacer nada">
                                    </div>
                                </div>
                                <div id="contenido-mostrar-privs" class="col">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" id="realizar-cambios">
                                    <div id="contenido-selects-privs">
                                        <label for="sucursales-emple" class="form-control bg-dark text-white ">
                                            Seleccione para cambiar el privilegio de un empleado
                                        </label>
                                        <select name="" id="cargos-emple" class="form-control mt-2">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <input type="hidden" id="id-emple-a-asignar">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="button" id="btn-guarda-cambios-privs" class="btn btn-info btn-block" value="Guardar Cambios">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="respuesta-privs-empleado" class="card-footer bg-dark">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contenedor para crear una nueva sucursal-->
    <div id="contenedor-sucursales" class="container" style="display:none;">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12 col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h2 class="text-center text-warning">
                                Formulario para la creacion de una nueva sucursal
                            </h2>
                        </div>
                    </div>
                    <div class="card-body" style="background: #FAFAFA;">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-6">
                                    <label for="txt-nom-suc" class="form-control bg-dark text-white">
                                            Digite el nombre de la sucursal: 
                                    </label>
                                    <input type="text" id="txt-nom-suc" class="form-control" placeholder="Nombre de la sucursal">
                                </div>
                                <div class="col-6">
                                    <label for="txt-cor-suc" class="form-control bg-dark text-white">
                                            Digite el correo de la sucursal: 
                                    </label>
                                    <input type="text" id="txt-cor-suc" class="form-control txt-cor-suc" placeholder="Correo de la sucursal">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="txt-dir-suc" class="form-control bg-dark text-white">
                                            Digite la direccion de la sucursal: 
                                        </label>
                                        <input type="text" id="txt-dir-suc" class="form-control" placeholder="Direccion de la sucursal">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <label for="txt-tel-suc" class="form-control bg-dark text-white">
                                            Digite el telefono de la sucursal: 
                                    </label>
                                    <input type="text" id="txt-tel-suc" class="form-control" placeholder="Telefono de la sucursal">
                                </div>
                                <div class="col-6">
                                    <label for="txt-fax-suc" class="form-control bg-dark text-white">
                                            Digite el fax de la sucursal: 
                                    </label>
                                    <input type="text" id="txt-fax-suc" class="form-control" placeholder="Fax de la sucursal">
                                </div>
                            </div>
                            <div class="row mt-5">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-info btn-block" id="btn-insercion-suc" value="Guardar Sucursal">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="button" id="btn-salir-sin-hacer-nada-suc" class="btn btn-danger btn-block" value="Salir sin hacer nada">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div id="respuesta-notificacion-sucursales" class="card-footer bg-dark">

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
    <script src="assets/js/configuraciones-controller.js"></script>

    <?php include('partials/footer/footer.php'); ?>
<?php
else :
    header('Location: page-not-found.php');
?>
<?php
    endif;
?>