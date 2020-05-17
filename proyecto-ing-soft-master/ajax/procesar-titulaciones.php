<?php
    include("../php-connect-db/db-connection.php");
    $query = "CALL SP_MUESTRA_TITULACIONES;";
    $resultado = mysqli_query($conexion , $query);
    $json = array();
    while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
        $json[] = array(
            'idTitulacion' => $row['ID_TITULACION'] ,
            'titulacion' => $row['TITULACION'] 
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    mysqli_close($conexion);
?>