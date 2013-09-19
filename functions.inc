<?php
	//conexion a la base de datos
	include("conexion.php");

	function content_status($status){
		$pid= $_GET['pid'];
		mysql_query("UPDATE registro . parrafos SET status = $status WHERE pid = $pid") or die(mysql_error());
		header("Location: home.php");
	}

	function content_delete($status){
		$pid= $_GET['pid'];
		mysql_query("DELETE FROM registro . parrafos  WHERE  parrafos . pid  = $pid") or die(mysql_error());
		header("Location: home.php");
	}

	function set_message($error){

	 	echo"<script>
	        alert(" . "'" .$error ."'". ");
	        window.location.href=\"login.html\"
	    </script>";   

	}

	function print_content($uid){
		
		$consulta = "SELECT texto,pid FROM parrafos WHERE uid = $uid";

		$resultado= @mysql_query($consulta) or die(mysql_error());
		$output = "";
		//obtendremos los datos que ha devuelto la base de datos
		while ($datos = @mysql_fetch_assoc($resultado) ){
				$pid 		= $datos['pid'];			
		    
		    $output .=  "<p>". $datos['texto'] . "</p> 	<br> 
		    <a href='delete.php?pid=$pid'>	Eliminar 		</a>
		    <a href='disable.php?pid=$pid'>	Desabilitar </a>
		    <a href='enable.php?pid=$pid'>	Habilitar 	</a>";
		    
		}

		return $output ;
}
?>