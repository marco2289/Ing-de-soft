<?php
    require('../php-connect-db/db-connection.php');
    $query = 'SELECT * FROM tbl_proveedor';
    $res = mysqli_query($conexion , $query);
    $json_proveedores = array();
    while(($row = mysqli_fetch_array($res , MYSQLI_ASSOC))) {
        $json_proveedores[] = array(
            'id' => $row['ID_PROVEEDOR'] ,
            'tipo' => $row['ID_TIPO_PROVEEDOR'] ,
            'nombre' => $row['NOMBRE_PROVEEDOR'] ,
            'direccion' => $row['DIRECCION'] ,
            'correo' => $row['CORREO'] ,
            'telefono' => $row['TELEFONO'] ,
            'status' => $row['ESTATUS_PROVEEDOR']
        );
    }
    $string = json_encode($json_proveedores);
    echo $string;
    mysqli_close($conexion);
?>