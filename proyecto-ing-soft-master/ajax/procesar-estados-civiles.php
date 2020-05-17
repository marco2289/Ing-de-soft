<?php
    include("../php-connect-db/db-connection.php");
    $query = "CALL SP_MUESTRA_ESTADO_CIVIL;";
    $resultado = mysqli_query($conexion , $query);
    $json = array();
    while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
        $json[] = array(
            'idEstado' => $row['ID_ESTADO_CIVIL'] ,
            'estado' => $row['ESTADO_CIVIL'] 
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    mysqli_close($conexion);
?>