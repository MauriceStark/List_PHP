<?php
//conexion a la base de datos
include("conexion.php");

/**
*Funcion para cambiar el status del contenido
*		@param int 1 enable, 0 disable
*/
function content_status($status){
	$pid= $_GET['pid'];
	mysql_query("UPDATE registro . parrafos SET status = $status WHERE pid = $pid") or die(mysql_error());
	header("Location: ../home.php");
}

function content_delete($status){
	$pid= $_GET['pid'];
	mysql_query("DELETE FROM registro . parrafos  WHERE  parrafos . pid  = $pid") or die(mysql_error());
	header("Location: ../home.php");
}

function set_message_error($error){

	echo"<script>
		  alert(" . "'" .$error ."'". ");
		  window.location.href=\"../login.html\"
	 </script>";

}

/**
*Funcion para consultar todo el contenido
*		@param string $departamento opcional
*		@return string
*/
function get_content($uid){
	$query = "SELECT texto,pid,fecha FROM parrafos WHERE uid = $uid ORDER BY pid DESC";
	return format_html($query) == "" ? "Publica un evento." : format_html($query);
}

/**
*Funcion que consulta en la base de datos los campos, fecha y texto
*		@param $uid int, $search string
*		@return string, el resultado de la busqueda formateado con html
*/
function get_search($uid,$search){
	$query = "SELECT texto,uid,pid,fecha FROM parrafos WHERE ( texto LIKE '%".$search."%' OR fecha LIKE '%".$search."%' ) AND uid = $uid ORDER BY pid DESC";
	return format_html($query) == "" ? "No tines eventos" : format_html($query);
}

/**
*Funcion para consultar y formatear el resultado
*		@param query a la base de datos
*		@return atring, devuelve la consulta de los eventos con html
*/
function format_html($query){

	$resultado= @mysql_query($query) or die(mysql_error());
	$output = "";

	while ($datos = @mysql_fetch_assoc($resultado) ){
		$pid 		= $datos['pid'];
		 $output .=  "<p>". $datos['texto'] . "</p>" .
						 "<p>". $datos['fecha'] . "</p><br>
						 <a href='core/delete.php?pid=$pid'>	Eliminar 	</a>
						 <a href='core/disable.php?pid=$pid'>	Desabilitar </a>
						 <a href='core/enable.php?pid=$pid'>	Habilitar 	</a>";
	}
	return $output;
	}
?>
