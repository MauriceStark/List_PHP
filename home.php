<?php
    include("core/conexion.php");
    include("core/access_Control.php");
    include("core/functions.php");
?>
<html>
    <head>
        <title> <?php echo $user ?> | List </title>
        <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
    <body>

    	<header>
    		<div class="container">
    			<div class="logo">List</div>
    			<a href="core/logout.php" class="logout">Salir</a>

    			<form name="buscar" action="" method="get">
					<input type="text" name="search" placeholder="Buscar...">
					<input type="submit" value="Buscar">
				</form>
    		</div>
    	</header>

		<div class="container">
			<h1>Bienvenido  <?php echo $user ?>!</h1>
			<img src="<?php echo get_image($uid); ?>" class="avatar" />
			<p>Publica tus eventos o tareas proximas.</p>

			<form action="core/upload_image.php" method="POST" enctype="multipart/form-data">
			  <input type="file" 	name="imagen" id="imagen" />
			  <input type="submit" 	name="subir" value="Subir"/>
			</form>

			<form name="form" action=""  onsubmit="enviarDatos(); return false">
				<input type="texto"  name="Parrafo" placeholder="Escribe tu evento..." />
				<input type="date" 	name="Fecha">
				<input type="submit" value="Publicar">
			</form>

			<div id="resultado"> <!-- Div donde se mostraran los resultados mediante ajax-->
				<?php
					// isset devuelve TRUE si la busqueda existe y tiene un valor distinto de NULL, FALSE de lo contrario.
					print isset($_GET[ 'search' ]) ? get_search($uid, $_GET[ 'search' ]) : get_content($uid);
				?>
			</div>
		</div>

    </body>
</html>
