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
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body style="font-family: 'Roboto', ;">
<?php
    if (isset($_SESSION['STATUS'])) :
?>
    <?php include('partials/header/header.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a8b47806ff.js" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?php include('partials/footer/footer.php'); ?>
<?php
else :
    header('Location: page-not-found.php');
?>
<?php
    endif;
?>