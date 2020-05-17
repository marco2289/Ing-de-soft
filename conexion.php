<?php
$host = "localhost";
$bd = "db_telefonia";
$usuarioBD = "local";
$pass = "local";

$conectar = mysqli_connect($host, $usuarioBD, $pass, $bd);
 if ($conectar->connect_errno) {
   echo "NO hay conexion";
   exit ();
 }else {
 }
