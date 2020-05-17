<?php
    session_start();
    include("../php-connect-db/db-connection.php");
    if(isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $clave = $_POST['clave'];
        $claveNueva = $_POST['clave-nueva'];
        $claveNuevaRepetida = $_POST['clave-nueva-repetida'];

        if(empty($clave) && ($claveNueva == $claveNuevaRepetida)) {
            echo json_encode('vacios');
            exit();
        }
        if(empty($claveNueva) && empty($claveNuevaRepetida)) {
            echo json_encode('vacios');
            exit();
        }
        if(empty($claveNueva) && empty($claveNuevaRepetida) && empty($clave)) {
            echo json_encode('vacios');
            exit();
        }
        if($claveNueva != $claveNuevaRepetida) {
            echo json_encode('noCoinciden');
            exit();
        }
        $sql = "SELECT CLAVE_EMPLEADO FROM tbl_empleados WHERE ID_EMPLEADO = '$id'";
        $res = mysqli_query($conexion,$sql);
        while(($row = mysqli_fetch_array($res,MYSQLI_ASSOC))) {
            if(password_verify($clave , $row['CLAVE_EMPLEADO'])) {
                $newPassword = password_hash($claveNueva,PASSWORD_DEFAULT);
                $sqlCambioClave = "UPDATE tbl_empleados SET CLAVE_EMPLEADO = '$newPassword' WHERE ID_EMPLEADO = '$id'";
                $resultado = mysqli_query($conexion , $sqlCambioClave);
                if($resultado) {
                    echo json_encode('exito');
                    $sqlBitacora = "CALL SP_CAPTURA_BITACORA($id,6)";
                    $resultados = mysqli_query($conexion,$sqlBitacora);
                    break;
                }
            } else {
                echo json_encode('incorrecto');
                break;
            }
        }
    }
    mysqli_close($conexion);
?>
