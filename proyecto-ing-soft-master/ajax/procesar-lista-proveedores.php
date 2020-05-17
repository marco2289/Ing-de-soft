<?php
    include_once('../php-connect-db/db-connection.php');
    $query = "CALL SP_TIPO_PROVEEDOR()";
    $results = mysqli_query($conexion , $query);
    $json = array();
    while ($row = mysqli_fetch_array($results , MYSQLI_ASSOC)) {
        $json[] = array(
            "id" => $row['ID_TIPO_PROVEEDOR'] ,
            "proveedor" => $row['TIPO_PROVEEDOR']
        );
    }
    echo json_encode($json);
    mysqli_close($conexion);
?>