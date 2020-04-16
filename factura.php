<?php
error_reporting (E_ALL ^ E_NOTICE);
require("conexion.php");
if ($conectar) {
  echo("conectado");
}

$fac = $_POST['data'];
print_r($fac);



  if (is_array($fac)){
    foreach ($fac as $key) {
    $ID_MODOS_DE_PAGO= $key['ID_MODOS_DE_PAGO'] ;
    $FECHA_FACTURA= $key['FECHA_FACTURA'];
    $IMPUESTO=$key['IMPUESTO'];
    $TOTAL_NETP= $key['TOTAL_NETP'];
    $conectar->query("INSERT INTO tbl_facturas (ID_DESCUENTOS, ID_MODOS_DE_PAGO, FECHA_FACTURA, IMPUESTO, TOTAL_NETP)
    VALUES (NULL, '$ID_MODOS_DE_PAGO', '$FECHA_FACTURA', '$IMPUESTO', '$TOTAL_NETP')");
    }
  }
