<?php
//conexion a la base de datos
include("conexion.php");

/**
*Funcion para cambiar el status del contenido
*		@param int 1 enable, 0 disable
*/
function content_status($status,$uid){
	$pid= $_GET['pid'];
	mysql_query("UPDATE parrafos SET status = $status WHERE pid = $pid AND uid = $uid") or die(mysql_error());
	header("Location: ../home.php");
}
/**
*Funcion para borrar un evento
*		El pid a eliminar se obtiene por GET
*/
function content_delete($uid){
	$pid= $_GET['pid'];
	mysql_query("DELETE FROM parrafos  WHERE  pid = $pid AND uid = $uid") or die(mysql_error());
	header("Location: ../home.php");
}

function count_status($uid,$status){
	$query 		= "SELECT status FROM parrafos WHERE uid = $uid AND status = $status";
	$resultado 	= @mysql_query( $query ) or die( mysql_error() );
	$datos 		= mysql_fetch_array( $resultado );	//Recupera una fila de resultados como un array asociativo
	$count 		= mysql_num_rows( $resultado ); 		//Obtiene el numero de filas de la consulta
	
	return $count;
}

function percent_complete($uid){
	$total_events = count_status($uid,1) + count_status($uid,0); 	// suma el total de eventos 
	$total_events = $total_events == 0 ? 1 : $total_events; 			// seguridad que evita una division entre 0
	$percent = (count_status($uid,0) / $total_events ) * 100; 		// saca el porcentaje de eventos realizados
	return round($percent);
}

function set_message_error($error){

	echo"<script>
		  alert(" . "'" .$error ."'". ");
		  window.location.href=\"../home.php\"
	 </script>";

}

/**
*Funcion para consultar el status de un evento
*		
*/
function event_status($pid){
	$query 		= "SELECT status FROM parrafos WHERE pid = $pid and status = 1";
	$resultado 	= @mysql_query( $query ) or die( mysql_error() );
	$datos 		= mysql_fetch_array( $resultado );	//Recupera una fila de resultados como un array asociativo
	$status 		= mysql_num_rows( $resultado ); 		//Obtiene el numero de filas de la consulta
	return $status;
}

/**
*Funcion para consultar todo el contenido
*		@param string $departamento opcional
*		@return string
*/
function get_content($uid){
	$query = "SELECT texto,pid,fecha,uid FROM parrafos WHERE uid = $uid ORDER BY pid DESC";
	return format_html($query) == "" ? "<div class='empty-event'>Publica un evento.</div>" : format_html($query);
}

/**
*Funcion que consulta en la base de datos los campos, fecha y texto
*		@param $uid int, $search string
*		@return string, el resultado de la busqueda formateado con html
*/
function get_search($uid,$search){
	$query = "SELECT texto,uid,pid,fecha FROM parrafos WHERE ( texto LIKE '%".$search."%' OR fecha LIKE '%".$search."%' ) AND uid = $uid ORDER BY pid DESC";

	$search_result  = '<a class="back-search" href="home.php">Ver todos </a>';
	$search_result .= format_html($query) == "" ? "<div class='empty-event'>No tines eventos '$search'</div>" : format_html($query);

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
		$pid = $datos['pid'];
		
		$class_status 	= event_status($pid) == 1 ? "content-event-enable" 		: "content-event-disable";
		$class_enable 	= event_status($pid) == 1 ? "button-enable" 					: "button-canceled";
		$url_status 	= event_status($pid) == 1 ? "core/disable.php?pid=$pid" 	: "core/enable.php?pid=$pid";
		
		$output .=  "<div class='$class_status'>" .
							"<a href='core/delete.php?pid=$pid' class='delete'> Eliminar </a>" .
							"<p>"
								. $datos['texto'] .
							"</p>
							 <h5>"
								. $datos['fecha'] .
							 "</h5>

							 <div class='$class_enable'>
							 	<button type='button' onclick=location.href='$url_status';>
									<span class='mark x'></span>
									<span class='mark xx'></span>
								</button>
							 </div>
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

	if ($_FILES["imagen"]["error"] > 0){
	  set_message_error("ha ocurrido un error, intentalo mas tarde.");
	} else {

	  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	  $limite_kb = 900;

	  if ( in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){

 		//Ruta donde copiaremos la imagen
		 $ruta = "../images/" . $_FILES['imagen']['name'];

			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){

			  //Verifica si la imagen que tiene no es la default para no borrarla de la carpeta
			  if(get_image($uid) != "images/default-avatar.png"){	 
				  unlink("../" . get_image($uid) ); //borra la imagen anterior que tenia				 
				  delete_image($uid); 					//borra la ruta de la base de datos
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
