<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start ();
include ("conexion.php");

$conn = "SELECT * from tbl_clientes a
inner join tbl_personas b
on (a.id_cliente = b.ID_PERSONA)";
$sql = mysqli_query($conectar, $conn);

$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode($result));
