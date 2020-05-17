<?php
    session_start();
    include("../php-connect-db/db-connection.php");
    if(isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $idBuscar = $_POST['txt-id-status'];
        if(empty($idBuscar)) {
            echo json_encode('idV');
            exit();
        }
        $sql = "SELECT B.NOMBRE_SUCURSAL, C.STATUS FROM tbl_empleados A LEFT JOIN tbl_sucursales B ON (A.ID_SUCURSAL = B.ID_SUCURSAL) 
        LEFT JOIN tbl_estatus_empleado C ON (A.ID_ESTATUS_EMPLEADO = C.ID_ESTATUS_EMPLEADO) WHERE ID_EMPLEADO = $idBuscar";
        $resultado = mysqli_query($conexion , $sql);
        $json = array();
        while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
            $json[] = array(
                'idSucursal' => $row['NOMBRE_SUCURSAL'] ,
                'idEstatus' => $row['STATUS'] ,
            );
            
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    mysqli_close($conexion);
?>