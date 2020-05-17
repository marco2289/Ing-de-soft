<?php
    session_start();
    include('../php-connect-db/db-connection.php');
    if (isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $idCargo = $_POST['cargo'];
        $idEmpleCambiar = $_POST['id-emple-a-asignar'];

        if(empty($idCargo)) {
            echo json_encode('cV');
            exit();
        }
        if(empty($idCargo) || $idCargo == '#') {
            echo json_encode('cargoV');
            exit();
        } 
        if (!empty($idCargo) && ($idCargo != '#')) {
            $sql = "UPDATE tbl_empleados SET ID_CARGO_EMPLEADO = $idCargo WHERE ID_EMPLEADO = $idEmpleCambiar";
            $res = mysqli_query($conexion,$sql);
            if($res) {
                $sqlBitacora = "CALL SP_CAPTURA_BITACORA($id,9)";
                $resultados = mysqli_query($conexion,$sqlBitacora);
                echo json_encode('correct');
                exit();
            }
        }

    }
    mysqli_close($conexion);
?>