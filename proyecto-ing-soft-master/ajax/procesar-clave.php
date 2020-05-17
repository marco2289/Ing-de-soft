<?php
    session_start();
    require('../php-connect-db/db-connection.php');

    if (isset($_SESSION['USER_ID']) && isset($_SESSION['CORREO']) && $_POST['key']) {
        $pass = $_POST['key'];
        $id = $_SESSION['USER_ID'];
        $email = $_SESSION['CORREO'];
        $sqlBitacora = "CALL SP_CAPTURA_BITACORA($id,1);";
        $records = mysqli_query($conexion , $sqlBitacora);
        $sql = "CALL SP_COMPRUEBA_CLAVE($id,'$email');";
        $resultados = mysqli_query($conexion , $sql);
        while(($row = mysqli_fetch_array($resultados , MYSQLI_ASSOC))) {
            if(password_verify($pass , $row['CLAVE_EMPLEADO'])) {
                echo json_encode('correcto');
                $aux = true;
                $_SESSION['STATUS'] = 'logueado';
                $_SESSION['USER_ID'] = $id;
                break;
            } 
            if(!password_verify($pass , $row['CLAVE_EMPLEADO'])) {
                echo json_encode('incorrecto');
                break;  
            }
        }


    } else {
        echo json_encode('vacios');
    }
    mysqli_close($conexion);
?>