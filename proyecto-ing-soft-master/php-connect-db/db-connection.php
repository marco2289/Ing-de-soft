<?php
    $host = 'localhost';
    $dbName = 'db_telefonia';
    $user = 'local';
    $passUser = 'local';

    $conexion = mysqli_connect($host , $user , $passUser);

    //si ocurre un error al seleccionar la base de datos
    mysqli_select_db($conexion , $dbName) or die ("<center><h2 style='color:red'>Error -> Base de Datos No Encontrada.</h2></center>");

    //si se produce un error al conectar que notifique y cierre la conexion
    if(mysqli_connect_errno()) {
        echo "<center><h2><strong>Ocurrio un error en la conexion.</strong></h2><enter>";
        exit();
    }

    mysqli_set_charset($conexion,"UTF8");
?>