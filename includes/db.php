<?php

session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crud_php_mysql');


 $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME); //cadena de conexion a base de datos.

// if($link === false){
//   die("conexion fallida" . mysqli_connect_error());
// }else{
//   echo 'conexion exitosa';
// }
?>