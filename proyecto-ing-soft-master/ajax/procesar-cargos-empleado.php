<?php
    include("../php-connect-db/db-connection.php");
    $query = "CALL SP_MUESTRA_CARGOS;";
    $resultado = mysqli_query($conexion , $query);
    $json = array();
    while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
        $json[] = array(
            'idCargo' => $row['ID_CARGO_EMPLEADO'] ,
            'descripcion' => $row['DESCRIPCION_CARGO_EMPLEADO'] 
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    mysqli_close($conexion);
?>