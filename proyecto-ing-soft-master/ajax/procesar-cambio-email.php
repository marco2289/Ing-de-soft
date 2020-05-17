<?php
    session_start();
    include("../php-connect-db/db-connection.php");
    if(isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $email = $_POST['email-actual'];
        $emailNueva = $_POST['email-nuevo'];
        $emailNuevaRepetida = $_POST['repite-email-nuevo'];

        if(empty($email) && ($emailNueva == $emailNuevaRepetida)) {
            echo json_encode('vacios');
            exit();
        }
        if(empty($emailNueva) && empty($emailNuevaRepetida)) {
            echo json_encode('vacios');
            exit();
        }
        if(empty($emailNueva) && empty($emailNuevaRepetida) && empty($email)) {
            echo json_encode('vacios');
            exit();
        }
        if($emailNueva != $emailNuevaRepetida) {
            echo json_encode('noCoinciden');
            exit();
        }
        $sql = "SELECT CORREO_EMPLEADO FROM tbl_empleados WHERE ID_EMPLEADO = '$id'";
        $res = mysqli_query($conexion,$sql);
        while(($row = mysqli_fetch_array($res,MYSQLI_ASSOC))) {
            if($email == $row['CORREO_EMPLEADO']) {
                $sqlCambioEmail = "UPDATE tbl_empleados SET CORREO_EMPLEADO = '$emailNueva' WHERE ID_EMPLEADO = '$id'";
                $resultado = mysqli_query($conexion , $sqlCambioEmail);
                if($resultado) {
                    echo json_encode('exito');
                    $sqlBitacora = "CALL SP_CAPTURA_BITACORA($id,7)";
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