<?php
    include("../php-connect-db/db-connection.php");
    $query = " CALL SP_MUESTRA_ESTATUS_EMPLEADO;";
    $resultado = mysqli_query($conexion , $query);
    $json = array();
    while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
        $json[] = array(
            'idEstatus' => $row['ID_ESTATUS_EMPLEADO'] ,
            'estatus' => $row['STATUS'] ,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    mysqli_close($conexion);
?>