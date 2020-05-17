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
    <title>App de Telefonia</title>
    <link rel="stylesheet" href="assets/css/bootstrap-personalizado-3.min.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <style>
        .input-error {
            border-bottom: solid 2px red;
        }
    </style>
</head>

<body style="font-family: 'Roboto', ;">
    <?php
    if (isset($_SESSION['STATUS'])) :
    ?>
        <?php include('partials/header/header.php'); ?>
        <!--Contenedor para insertar un nuevo proveedor-->
        <br>
        <br>
        <div id="contenedor-proveedores" class="container-fluid mt-5">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" style="background: #212121;">
                            <h2 class="text-center " style="color:#ffbb33;">
                                Formulario para la insercion de proveedores</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-12">
                                    <div class="card">
                                        <div class="card-header  tex-center" style="background: #212121;">
                                            <h3 style="color:#fff;">Acciones</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="button" onclick="insercion()" id="btn-insercion" class="btn btn-success btn-block" value="Insertar proveedor">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="button" onclick="mostrar()" id="btn-mostrar" class="btn btn-info btn-block" value="Ver Proveedores">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="display: none">
                                                <div class="col">
                                                    <input type="button" onclick="editar()" id="btn-edicion" class="btn btn-danger btn-block" value="Editar Proveedor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer" style="background: #212121;">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-sm-12" style="display:block" id="insercion">
                                    <div class="card">
                                        <div class="card-header " style="background: #212121;">
                                            <h2 class="text-center " style="color:#ffbb33;">
                                                Datos del proveedor
                                            </h2>

                                        </div>
                                    </div>
                                    <div class="card-body" style="background: #FAFAFA;">
                                        <div class="container">
                                            <div class="row mt-5">
                                                <div class="col-12">
                                                    <label for="txt-nom-suc" class="form-control  text-white" style="background: #212121;">
                                                        Digite el nombre del proveedor:
                                                    </label>
                                                    <input type="text" id="txt-nombre-proveedor" class="form-control" placeholder="Nombre del proveedor" autofocus>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <label for="txt-cor-suc" class="form-control  text-white" style="background: #212121;">
                                                        Seleccione el tipo de proveedor:
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <select name="tipo-proveedor" id="tipo-proveedor" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="direccion-proveedor" class="form-control  text-white" style="background: #212121;">
                                                            Digite direccion del proveedor:
                                                        </label>
                                                        <input type="text" id="direccion-proveedor" class="form-control" placeholder="Direccion del proveedor">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="correo" class="form-control  text-white" style="background: #212121;">
                                                            Digite correo del proveedor:
                                                        </label>
                                                        <input type="email" id="correo" class="form-control" placeholder="Correo del proveedor">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="telefono" class="form-control  text-white" style="background: #212121;">
                                                            Digite telefono del proveedor:
                                                        </label>
                                                        <input type="text" id="telefono" class="form-control" placeholder="Telefono del proveedor">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input type="button" class="btn btn-info btn-block" onclick="GuardarInformacion ()" id="btn-insercion-suc" value="Guardar Proveedor">
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
                                    <div id="respuesta-notificacion-proveedores" class="card-footer" style="background: #212121;">

                                    </div>
                                </div>
                                <div class="col-lg-9 col-sm-12 mx-auto" style="display: none" id="mostrar">
                                    <table class="table table-bordered table-hover">
                                        <thead style="background: #212121;">
                                            <tr class="text-center text-white">
                                                <th>Id</th>
                                                <th>Tipo</th>
                                                <th>Proveedor</th>
                                                <th>Direccion Proveedor</th>
                                                <th>Correo</th>
                                                <th>Telefono</th>
                                                <th>Estatus</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="muestra-proveedores" class="text-center">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-9 col-sm-12 mx-auto my-auto" style="display: none" id="editar">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header text-center text-white"  style="background: #212121;">
                                                    <h3 class="text-white">Busca un proveedor</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <input type="text" name="identificador" id="identificador" class="form-control" placeholder="Digite el identificador del proveedor">
                                                    </div>
                                                </div>
                                                <div class="card-footer" style="background: #212121;">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col my-auto">
                                        <div class="form-group">
                                                <input
                                                    type="button"
                                                    class="btn btn-success"
                                                    value="Buscar Informacion"
                                                    onclick="buscarProveedor()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-sm-12" style="display:none" id="insercion2">
                                    <div class="card">
                                        <div class="card-header " style="background: #212121;">
                                            <h2 class="text-center " style="color:#ffbb33;">
                                                Informacion del proveedor
                                            </h2>

                                        </div>
                                    </div>
                                    <div class="card-body" style="background: #FAFAFA;">
                                        <div class="container">
                                            <div class="row mt-5">
                                                <div class="col-12">
                                                    <label for="txt-nom-suc" class="form-control  text-white" style="background: #212121;">
                                                        Digite el nombre del proveedor:
                                                    </label>
                                                    <input type="text" id="p1" class="form-control" placeholder="Nombre del proveedor" autofocus>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <label for="se" class="form-control  text-white" style="background: #212121;">
                                                        Seleccione el tipo de proveedor:
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <select name="tipo-proveedor" id="tipo-proveedor2" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="direccion-proveedor" class="form-control  text-white" style="background: #212121;">
                                                            Digite direccion del proveedor:
                                                        </label>
                                                        <input type="text" id="p3" class="form-control" placeholder="Direccion del proveedor">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="correo" class="form-control  text-white" style="background: #212121;">
                                                            Digite correo del proveedor:
                                                        </label>
                                                        <input type="email" id="p4" class="form-control" placeholder="Correo del proveedor">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="telefono" class="form-control  text-white" style="background: #212121;">
                                                            Digite telefono del proveedor:
                                                        </label>
                                                        <input type="text" id="p5" class="form-control" placeholder="Telefono del proveedor">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input type="button" class="btn btn-info btn-block" id="btn-insercion-suc" value="Actualizar Informcion">
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
                                    <div id="respuesta-notificacion-proveedores" class="card-footer" style="background: #212121;">

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

        <script src="assets/js/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/a8b47806ff.js" crossorigin="anonymous"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/provider-controller.js"></script>
        <?php include('partials/footer/footer.php'); ?>
    <?php
    else :
        header('Location: page-not-found.php');
    ?>
    <?php
    endif;
    ?>
</body>

</html>
