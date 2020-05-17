<?php
    session_start();
    include('../php-connect-db/db-connection.php');
    if(!isset($_POST['txt-email']) || empty($_POST['txt-email'])) {
        echo json_encode('error');
    } else {
        $email = $_POST['txt-email'];
        $sql = "CALL SP_LOGIN_USUARIOS('$email')";
        $res = mysqli_query($conexion , $sql);
        
        if($res) {
            $json = array();
            while($row = mysqli_fetch_array($res)) {
                $_SESSION['USER_ID'] = $row['ID_EMPLEADO'];
                $_SESSION['CORREO'] = $row['CORREO_EMPLEADO'];
                $json[] = array(
                    'id' => $_SESSION['USER_ID'],
                    'correo' => $_SESSION['CORREO']
                );
            }
            echo json_encode($json);
        } 

    }
    mysqli_close($conexion);
?>