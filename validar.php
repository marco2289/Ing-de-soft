<?php
include ("conexion.php");
error_reporting (E_ALL ^ E_NOTICE);
session_start ();
$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$apellido;

 //conexion a la BD
 $query = "SELECT a.NOMBRE_PERSONA, b.OBSERVACIONES_EMPLEADO, c.DESCRIPCION_CARGO_EMPLEADO, b.CLAVE_EMPLEADO, b.CORREO_EMPLEADO from tbl_personas a
 inner join tbl_empleados b
 on (a.ID_PERSONA = b.ID_EMPLEADO)
 inner join tbl_cargo_empleado c
 on (b.ID_CARGO_EMPLEADO = c.ID_CARGO_EMPLEADO)WHERE b.CORREO_EMPLEADO = '$nombre' and b.CLAVE_EMPLEADO = '$clave' ";
 $resultado = mysqli_query($conectar, $query);
 $filas = mysqli_fetch_array($resultado);


 if ($filas>0) {
   $_SESSION['nombre'] = $nombre;
   $_SESSION['clave'] = $clave;


   header("location:ventas.php");
 }else {
   echo 'DATOS INCORRECTOS';
 }



 ?>
