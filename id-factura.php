<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start ();

include ("conexion.php");
$conn = "SELECT MAX(id_factura) AS id FROM tbl_facturas";
$sql = mysqli_query($conectar, $conn);
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
exit(json_encode($result));
