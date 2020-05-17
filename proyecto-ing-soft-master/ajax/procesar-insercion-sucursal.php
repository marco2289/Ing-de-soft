o<?php
    session_start();
    include('../php-connect-db/db-connection.php');
    if (isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono']; 
        $correo = $_POST['correo'];
        $fax = $_POST['fax'];

        $sql = "CALL SP_INSERTA_SUCURSAL ('$nombre','$direccion','$telefono','$fax','$correo');";
        $res = mysqli_query($conexion,$sql);
        if($res) {
            $sqlBitacora = "CALL SP_CAPTURA_BITACORA($id,10)";
            $resultados = mysqli_query($conexion,$sqlBitacora);
            echo json_encode('exito');
            exit();
        }
    }
    mysqli_close($conexion);
?>
