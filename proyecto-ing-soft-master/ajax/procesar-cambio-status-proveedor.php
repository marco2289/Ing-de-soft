<?php
    session_start();
    require('../php-connect-db/db-connection.php');
    if(isset($_SESSION['USER_ID'])) {
        $user = $_SESSION['USER_ID'];
        $id = $_POST['id'];
        $query = "SELECT ID_PROVEEDOR , ESTATUS_PROVEEDOR FROM tbl_proveedor WHERE ID_PROVEEDOR = $id";
        $res = mysqli_query($conexion , $query);
        while(($row = mysqli_fetch_array($res , MYSQLI_ASSOC))) {
            if($row['ESTATUS_PROVEEDOR'] == 'activo') {
                $modificaEstatus = "UPDATE tbl_proveedor SET ESTATUS_PROVEEDOR = 'inactivo' WHERE ID_PROVEEDOR = $id";
                $res2 = mysqli_query($conexion , $modificaEstatus);
                if($res2) {
                    echo json_encode('Cambios realizados con exito');
                    $sql = "CALL SP_CAPTURA_BITACORA($id,12)";
                    $obt = mysqli_query($conexion,$sql);
                    exit();
                }
            }
            if($row['ESTATUS_PROVEEDOR'] == 'inactivo') {
                $modificaEstatus = "UPDATE tbl_proveedor SET ESTATUS_PROVEEDOR = 'activo' WHERE ID_PROVEEDOR = $id";
                $res3 = mysqli_query($conexion , $modificaEstatus);
                if($res3) {
                    echo json_encode('Cambios realizados con exito');
                    $sql2 = "CALL SP_CAPTURA_BITACORA($id,14)";
                    $resultado = mysqli_query($conexion, $sql2);
                    exit();
                }
            }
        }
    }
    mysqli_close($conexion);
?>
