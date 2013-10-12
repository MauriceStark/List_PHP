<?php

//Configuracion de la conexion a base de datos
  $bd_host 		= "localhost";
  $bd_usuario 	= "root";
  $bd_password = "maurice";
  $bd_base 		= "registro";

	$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
	mysql_select_db($bd_base, $con);

//consulta todos los empleados
$sql = mysql_query("SELECT texto, fecha FROM parrafos WHERE uid = 40 ORDER BY pid DESC",$con);

  while($row = mysql_fetch_array($sql)){
  		echo "<p>" . $row['texto'] . "</p>";
  		echo "<p>" . $row['fecha'] . "</p>";
  }
?>
