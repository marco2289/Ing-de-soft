<?php
    session_start();
    include('../php-connect-db/db-connection.php');

    function generar_passwords($tamanio) {
    
        // Conjunto de caracteres a usar para generar el key
        $charset = "abcdefghijklmnopqrstuvwxyzABCDEFJHIJKLMNOPQRSTUVWXYZ1234567890@$";
        $claveGenerada = "";
        for ($i=0;$i<$tamanio;$i++){
            $aleatorio = rand() % strlen($charset);

            //va añadiendo un caracter aleatorio por cada iteracion
            $claveGenerada .= substr($charset,$aleatorio,1);
        }
        return $claveGenerada;
    }

    if(isset($_POST['identidad']) && isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['fecha']) && isset($_POST['genero']) && isset($_POST['estadoCivil']) && isset($_POST['direccion']) && isset($_POST['cargo']) && isset($_POST['sucursal']) && isset($_POST['titulacion']) && isset($_POST['email'])) {
        $identidad = $_POST['identidad'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        $genero = $_POST['genero'];
        $estadoCivil = $_POST['estadoCivil'];
        $direccion = $_POST['direccion'];
        $cargo = $_POST['cargo'];
        $sucursal = $_POST['sucursal'];
        $titulacion = $_POST['titulacion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $obs = $_POST['obs'];

        $tamanio = 10;
        $password = generar_passwords($tamanio);//enviar por correo
        $newPassword = password_hash($password,PASSWORD_DEFAULT);//contraseña hasheada a guardar

        $sqlInsertPersona = "CALL SP_INSERTA_PERSONA('$nombres','$apellidos',$genero,$estadoCivil,'$identidad','$fecha','$direccion','$telefono','$celular');";
        $res = mysqli_query($conexion , $sqlInsertPersona);

        $sqlInsertEmpleado = "CALL SP_INSERTA_EMPLEADO($sucursal,1,$titulacion,$cargo,NOW(),'$email','$newPassword','$obs','usuario.png');";
        $res2 = mysqli_query($conexion , $sqlInsertEmpleado);
        if(isset($_SESSION['USER_ID'])){
            $id = $_SESSION['USER_ID'];
            $sql = "CALL SP_CAPTURA_BITACORA($id,5)";
            $resultados = mysqli_query($conexion,$sql);
        }
        

        if($res==true && $res2==true) {

            //$nombre = 'Gerente de Operaciones';

            //$asunto = 'Envio de Contraseña de Logueo';

            /*$mensaje = 'Bienvenido a nuestra empresa esperamos, que se sienta a gusto con nosotros , le adjuntamos su clave correspondiente para poder utilizar el sistema , debe cambiarla para tener mas seguridad en su cuenta , estamos a su disposicion para servirle. ' . '\nClave de su Cuenta -> ' . $password . '.';*/

            //$header = 'Enviado desde la plataforma de CelMun2';

            //$mensajeCompleto = $mensaje . '\nAtentamente: ' . $nombre;
            //mail($email , $asunto , $mensajeCompleto , $header);

            /*$json[] = array(
                "mensaje" => "Persona Insertada Exitosamente, Que el Nuevo Empleado Verifique su Correo Electronico para que pueda ver su contraseña.",
                "password" => 
            );*/
            echo json_encode($password);

        }
    }



?>