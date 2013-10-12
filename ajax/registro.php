<?php

//Configuracion de la conexion a base de datos
  $bd_host = "localhost";
  $bd_usuario = "root";
   $bd_password = "maurice";
  $bd_base = "registro";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
mysql_select_db($bd_base, $con);

//variables POST
  $texto = $_POST['texto'];
  $fecha = $_POST['fecha'];
  $uid = 40;

//registra los datos del empleados
  $sql="INSERT INTO parrafos (uid, texto, fecha) VALUES ('$uid','$texto', '$fecha')";

mysql_query($sql,$con) or die('Error. '.mysql_error());

include('consulta.php');
?>
