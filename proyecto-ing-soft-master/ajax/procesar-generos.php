<?php
    include("../php-connect-db/db-connection.php");
    $query = "CALL SP_MUESTRA_GENERO;";
    $resultado = mysqli_query($conexion , $query);
    $json = array();
    while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
        $json[] = array(
            'idGenero' => $row['ID_GENERO'] ,
            'genero' => $row['GENERO'] ,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    mysqli_close($conexion);
?>