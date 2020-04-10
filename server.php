<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start ();
 // CREATE CONNECTION
include ("conexion.php");

// FETCH DATA
$conn = "SELECT * from tbl_producto";
$sql = mysqli_query($conectar, $conn);

// STORE DATA IN result VARIABLE
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode($result));
