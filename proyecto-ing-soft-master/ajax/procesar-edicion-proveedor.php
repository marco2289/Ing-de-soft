<?php
    session_start();
    include_once('../php-connect-db/db-connection.php');
    if(isset($_POST['id']) && !empty($_POST['id']) && isset($_SESSION['USER_ID'])) {
        $id = $_POST['id'];
        $busquedaProveedor = "SELECT * FROM tbl_proveedor WHERE ID_PROVEEDOR = $id";
        $results = mysqli_query($conexion , $busquedaProveedor);

        $proveedor[] = array();
        while(($row = mysqli_fetch_array($results , MYSQLI_ASSOC))) {
            $proveedor = array(
                'id' => $row['ID_PROVEEDOR'] ,
                'tipoProv' => $row['ID_TIPO_PROVEEDOR'] ,
                'nombreProv' => $row['NOMBRE_PROVEEDOR'] ,
                'direccion' => $row['DIRECCION'] ,
                'correo' => $row['CORREO'] ,
                'telefono' => $row['TELEFONO']
            );
        }
        $proveedorToString = json_encode($proveedor);
        echo $proveedorToString;
    }
    mysqli_close($conexion);
?>