<?php
    session_start();
    require('php-connect-db/db-connection.php');
    if(isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $sql = "CALL SP_CAPTURA_BITACORA($id,2)";
        $resultados = mysqli_query($conexion,$sql);
        if($resultados) {
            session_unset();
            session_destroy();
            header("Location: ./index.php");
            exit;
        }
    }
    mysqli_close($conexion);
?>