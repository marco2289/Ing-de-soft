<?php
error_reporting (E_ALL ^ E_NOTICE);
require("conexion.php");
$ID_MODOS_DE_PAGO= $_POST['radiobtn'] ;
$FECHA_FACTURA= $_POST['fecha1'];
$IMPUESTO=$_POST['impuesto1'];
$TOTAL_NETP= $_POST['total1'];
$consulta= "INSERT INTO tbl_facturas (ID_DESCUENTOS, ID_MODOS_DE_PAGO, FECHA_FACTURA, IMPUESTO, TOTAL_NETP)
VALUES (NULL, '$ID_MODOS_DE_PAGO', '$FECHA_FACTURA', '$IMPUESTO', '$TOTAL_NETP')";

if ($ID_MODOS_DE_PAGO===NULL&$IMPUESTO===NULL&$TOTAL_NETP===NULL){
  echo json_encode("error1");
} elseif ($IMPUESTO===NULL&$TOTAL_NETP===NULL||$IMPUESTO==='0'||$TOTAL_NETP==='0') {
  echo json_encode("error2");
}elseif ($ID_MODOS_DE_PAGO===NULL) {
  echo json_encode("error3");
}else {
  echo json_encode('correcto: Modo de pago:'.$ID_MODOS_DE_PAGO.'Fecha'.$FECHA_FACTURA.'Impuesto:'.$IMPUESTO.'Total:'.$TOTAL_NETP);
  $respuesta = mysqli_query($conectar, $consulta);
}


 ?>
