<?php include("access_Control.php"); ?>

<?php
        // Datos de la conexion
        include("conexion.php");

        // Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
        $search = $_GET[ 'search' ];

        $consulta = "SELECT texto,uid,pid,fecha FROM parrafos WHERE ( texto like '%" .  $search . "%' OR fecha like '%" .  $search . "%' ) AND uid = $uid";

				$resultado= @mysql_query($consulta) or die( mysql_error() );

				$output = "";
				//obtendremos los datos que ha devuelto la base de datos
				while ($datos = @mysql_fetch_assoc($resultado) ){
						$pid 		= $datos['pid'];

						$output .=  "<p>". $datos['texto'] . "</p>" .
												"<p>". $datos['fecha'] . "</p><br>
						<a href='core/delete.php?pid=$pid'>		Eliminar 		</a>
						<a href='core/disable.php?pid=$pid'>	Desabilitar </a>
						<a href='core/enable.php?pid=$pid'>		Habilitar 	</a>";
				}

        echo $output;
        //header("Location: ../home.php");
    ?>
