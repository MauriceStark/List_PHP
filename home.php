<?php
    include("core/conexion.php");
    include("core/access_Control.php");
    include("core/functions.php");
?>
<html>
    <head>
        <title> <?php print $user ?> | List </title>
        <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
    <body>

    	<header>
    		<div class="container">
    			<div class="logo">List </div>

    			<div class="search">
    				<form name="buscar" action="" method="get">
						<input type="text" name="search" placeholder="Buscar..."class="the-icons">
						<input type="submit" value="Buscar">
					</form>
    			</div>

    		</div>
    	</header>

		<div class="container">
			<p class="fixed-header"></p>

			<div class="welcome">
				<h1>Bienvenido  <?php print $user ?>!</h1>
				<p>Publica tus recordatorios, eventos o tareas proximas.</p>
				<hr>
			</div>

			<div class="primary"><!-- Div primario parte izquierda-->

				<div class="avatar">
					
					<img src="<?php print get_image($uid); ?>" />	
					
					<form action="core/upload_image.php" method="POST" enctype="multipart/form-data">
						<div class="file_upload_button">
							<input type="file" 	name="imagen" required>
						</div>
						<input type="submit" 	name="subir" value="Subir"/>
					</form>
					
					<div class="wraper-progress">
						<div class="progress-radial progress-<?php print percent_complete($uid)?>">
							<div class="overlay"><?php print percent_complete($uid)?>%</div>
						</div>
					</div>	
					
					<div class="data-event">
						<h2>Pendientes</h2>
						<h2>Completados</h2>
						<span><?php print count_status($uid,1) ?></span>
						<span><?php print count_status($uid,0) ?></span>
					</div>																		

					<a href="core/logout.php" class="logout">
						<span class="icon-off"></span>
						Log Out
					</a>			
			
				</div><!-- END avatar-->		
			</div>

			<div class="second"><!-- Div secondario parte derecha-->

				<div class="form-event">
					<form name="form" action=""  onsubmit="enviarDatos(); return false">
						<textarea name="Parrafo" placeholder="Publica un recordatorio..." maxlength="350" required></textarea>
						<input type="date" 	name="Fecha">
						<input type="submit" value="Publicar">
					</form>
				</div>
			  
			  
				<div id="resultado"> <!-- Div donde se mostraran los resultados mediante ajax-->
					<?php
						// isset devuelve TRUE si la busqueda existe y tiene un valor distinto de NULL, FALSE de lo contrario.
						print isset($_GET[ 'search' ]) ? get_search($uid, $_GET[ 'search' ]) : get_content($uid);
					?>
				</div>
			</div>

		 </div><!-- END container-->
    </body>
</html>

