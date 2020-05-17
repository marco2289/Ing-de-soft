<?php
    session_start();
    include('../php-connect-db/db-connection.php');
    if (isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $idSucursal = $_POST['sucursal'];
        $idEstatus = $_POST['estatus'];
        $idEmpleCambiar = $_POST['id-emple-a-cambiar'];

        if(empty($idSucursal)) {
            echo json_encode('sucursalV');
            exit();
        }
        if(empty($idEstatus)) {
            echo json_encode('estatusV');
            exit();
        }
        if(empty($idSucursal) || $idSucursal == '#') {
            echo json_encode('sucursalV');
            exit();
        }
        if (empty($idEstatus) || $idEstatus == '#') {
            echo json_encode('estatusV');

        } 
        if (empty($idSucursal) && empty($idEstatus) || ($idSucursal == '#' && $idEstatus == '#')) {
            echo json_encode('vacios');
            exit();
        } 
        if (!empty($idSucursal) && !empty($idEstatus) && ($idSucursal != '#' && $idEstatus != '#')) {
            $sql = "UPDATE tbl_empleados SET ID_SUCURSAL = '$idSucursal' , ID_ESTATUS_EMPLEADO = '$idEstatus' WHERE ID_EMPLEADO = $idEmpleCambiar";
            $res = mysqli_query($conexion,$sql);
            if($res) {
                $sqlBitacora = "CALL SP_CAPTURA_BITACORA($id,8)";
                $resultados = mysqli_query($conexion,$sqlBitacora);
                echo json_encode('correcto');
                exit();
            }
        }

    }
    mysqli_close($conexion);
?>