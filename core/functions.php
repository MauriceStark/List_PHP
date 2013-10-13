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
		  window.location.href=\"../home.php\"
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

	$search_result  = '<a class="back-search" href="home.php">Ver todos </a>';
	$search_result .= format_html($query) == "" ? "No tines eventos" : format_html($query);

	return $search_result;
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

		$output .=  "<div class='content-vent'>" .
							"<p>"
								. $datos['texto'] .
							"</p>
							 <h5>"
								. $datos['fecha'] .
							 "</h5>
							 <a href='core/delete.php?pid=$pid' 	class='delete'>	Eliminar 	</a>
							 <a href='core/disable.php?pid=$pid'	class='disable'>	Desabilitar </a>
							 <a href='core/enable.php?pid=$pid'  	class='enable'>	Habilitar 	</a>
						 </div>";
	}
	return $output;
}

function get_image($uid){

	$query 		= "SELECT imagen FROM imagenes WHERE uid = $uid";
	$resultado 	= @mysql_query( $query ) or die( mysql_error() );
	$datos 		= mysql_fetch_assoc( $resultado );
	$rows_image = mysql_num_rows( $resultado ); //devuelve el numero de filas de la consulta

	if($rows_image != 0){
		$ruta 	= "images/" . $datos['imagen'];
	}else{
		$ruta 	= "images/default-avatar.png";
	}
	return $ruta;
}

function delete_image($uid){
	mysql_query("DELETE FROM registro . imagenes  WHERE uid = $uid") or die( mysql_error() );
}

function upload_image($uid){
	//comprobamos si ha ocurrido un error.
	if ($_FILES["imagen"]["error"] > 0){
	  set_message_error("ha ocurrido un error, intentalo mas tarde.");
	} else {

	  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	  //y que el tamano del archivo no exceda los 900kb
	  $limite_kb = 900;

	  if ( in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){

 		//esta es la ruta donde copiaremos la imagen
		 $ruta = "../images/" . $_FILES['imagen']['name'];

			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){

			  //verificamos si la imagen que tiene no es la default para no borrarla de la carpeta
			  if(get_image($uid) != "images/default-avatar.png"){
				  //borra la imagen anterior que teniamos
				  unlink("../" . get_image($uid) );
				  //borra la ruta de la imagen de la base de datos
				  delete_image($uid);
			  }

			  $nombre = $_FILES['imagen']['name'];
			  @mysql_query("INSERT INTO imagenes (imagen, uid) VALUES ('$nombre', '$uid')");
			  header("Location: ../home.php");
			} else {
			  set_message_error("Ocurrio un error al mover el archivo.");
			}
	  } else {
	  	 set_message_error("Archivo no permitido, es tipo de archivo prohibido o excede los $limite_kb Kilobytes.");
	  }
	}
}
?>
