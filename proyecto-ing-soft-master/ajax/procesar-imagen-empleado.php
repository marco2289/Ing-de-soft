<?php
    require("../php-connect-db/db-connection.php");
    session_start();
    if(isset($_SESSION["USER_ID"])){
        $idUsuario = $_SESSION["USER_ID"];
    }
    if(isset($_FILES["imagen"])) {
            //Propiedades de la imagen
            $nombre_imagen = $_FILES['imagen']['name'];
            $tipo_imagen = $_FILES['imagen']['type'];
            $tamanio = $_FILES['imagen']['size'];

            //si el tamaño de la imagen es mayor a 3 MB
            if($tamanio <= 3000000) {
                //si los archivos no concuerdan con este formato que envie un mensaje
                if ($tipo_imagen != 'image/jpg' && $tipo_imagen != 'image/jpeg' && $tipo_imagen != 'image/png' && $tipo_imagen != 'image/gif') {

                    echo "Error, El Archivo No Es Una Imagen"; 

                } else { //caso contrario que procese la imagen

                    //ruta destino imagen DOCUMENT_ROOT->HTDOCS
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/proyecto-ing-soft/assets/img/uploads/fotografias-empleados/';

                    //primer parametro la ruta temporal donde se almacena y segundo la carpeta de destino
                    //la movemos del directorio temporal al escogido
                    move_uploaded_file($_FILES['imagen']['tmp_name'] , $carpeta_destino.$nombre_imagen);
                }

            } else {
                echo "El Tamaño Del Archivo Es Demasiado Grande";
            }
        } else {//caso contrario
            echo "No hay archivos";
        }

        $sql = "UPDATE tbl_empleados SET FOTOGRAFIA_EMPLEADO = '$nombre_imagen' WHERE ID_EMPLEADO = $idUsuario";
        $resultado = mysqli_query($conexion , $sql);

        if($resultado){
            $json[] = array("mensaje" => "Fotografia Insertada Con Exito.");
            $string = json_encode($json);
            echo $string;
        }

        mysqli_close($conexion);
?>