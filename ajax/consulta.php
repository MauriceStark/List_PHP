<?php

//Configuracion de la conexion a base de datos
  $bd_host = "localhost";
  $bd_usuario = "root";
  $bd_password = "maurice";
  $bd_base = "test";

	$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
	mysql_select_db($bd_base, $con);

//consulta todos los empleados
$sql = mysql_query("SELECT * FROM empleados",$con);

  while($row = mysql_fetch_array($sql)){
  	echo "<p>" . $row['nombre'] . "</p>";
  	echo $row['apellido'];
  }
?>
