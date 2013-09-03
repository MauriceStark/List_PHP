<?php
	//conexion a la base de datos
	include("conexion.php");

	//la conexión con la base de datos en MySQL 
	$conexion = mysql_connect( $host,$user,$password );
	mysql_select_db( $DBname,$conexion );
	
	$pid= $_GET['pid'];
	mysql_query("UPDATE registro . parrafos SET status = '1' WHERE pid = $pid") or die(mysql_error());
	header("Location: home.php");
?>