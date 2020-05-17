<?php
    include("../php-connect-db/db-connection.php");
    $query = "CALL SP_MUESTRA_SUCURSALES;";
    $resultado = mysqli_query($conexion , $query);
    $json = array();
    while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
        $json[] = array(
            'idSucursal' => $row['ID_SUCURSAL'] ,
            'sucursal' => $row['NOMBRE_SUCURSAL'] 
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    mysqli_close($conexion);
?>