<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start ();

include ("conexion.php");

$con = "SELECT MAX(ID_PERSONA) AS id FROM tbl_personas";
$sqli = mysqli_query($conectar, $con);
$result = mysqli_fetch_row($sqli);
$id= $result[0] + 1 ;
$nombre = $_POST['reg-nombre'];
$apellido =$_POST['reg-apellido'];
$correo =$_POST['reg-correo'];
$telefono =$_POST['reg-telefono'];
$celular =$_POST['reg-celular'];
$direccion =$_POST['reg-direccion'];
$genero =$_POST['reg-radiobtn'];
$rtn =$_POST['reg-rtn'];
$consulta = "CALL SP_CLIENTE_PERSONA('$id' , '$rtn' , '$genero' , NULL, '$nombre' , '$apellido',NULL , NULL, '$direccion' ,'$telefono' , '$celular', '$correo')";

if ($nombre===''&$apellido===''&$correo===''&$telefono===''&$celular===''&$direccion===''&$rtn==='') {
	  echo json_encode("error");
} elseif ($nombre===NULL||$apellido===NULL||$correo===NULL||$telefono===NULL||$celular===NULL||$direccion===NULL||$genero==NULL||$rtn===NULL) {
		  echo json_encode("error-2");
} else{

	echo json_encode($nombre);
$respuesta = mysqli_query($conectar, $consulta);
}



 ?>
