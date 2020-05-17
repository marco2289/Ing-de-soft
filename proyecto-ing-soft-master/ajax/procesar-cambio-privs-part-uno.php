<?php
    session_start();
    include("../php-connect-db/db-connection.php");
    if(isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $idBuscar = $_POST['txt-id-privs'];
        if(empty($idBuscar)) {
            echo json_encode('idV');
            exit();
        }
        $sql = "SELECT B.DESCRIPCION_CARGO_EMPLEADO FROM tbl_empleados A LEFT JOIN tbl_cargo_empleado B ON (A.ID_CARGO_EMPLEADO = B.ID_CARGO_EMPLEADO) 
        WHERE ID_EMPLEADO = $idBuscar";
        $resultado = mysqli_query($conexion , $sql);
        $json = array();
        while (($row = mysqli_fetch_array($resultado , MYSQLI_ASSOC))) {
            $json[] = array(
                'cargo' => $row['DESCRIPCION_CARGO_EMPLEADO']
            );
            
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    mysqli_close($conexion);
?>