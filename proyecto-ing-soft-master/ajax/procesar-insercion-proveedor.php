<?php
    session_start();
    require('../php-connect-db/db-connection.php');
    if(isset($_SESSION['USER_ID'])) {
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $direccion = $_POST['direccion'];
        $correo =  $_POST['correo'];
        $telefono =  $_POST['telefono'];
        $user = $_SESSION['USER_ID'];
        $query = "CALL SP_INSERTA_PROVEEDOR($tipo,'$nombre','$direccion','$correo','$telefono','activo');";
        $res = mysqli_query($conexion , $query);
        if ($res) {
            $sqlBitacora = "CALL SP_CAPTURA_BITACORA($user,11)";
            $resBitacora = mysqli_query($conexion , $sqlBitacora);
            if ($resBitacora){
                echo json_encode('Proveedor Ingresado con exito.');
                exit();
            }
        }
    }

?>
