<?php
    include("core/conexion.php");
    include("core/access_Control.php");
    include("core/functions.php");
?>
<html>
    <head>
        <title> <?php echo $user ?> | List </title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
    <body>

        <h1>Bienvenido  <?php echo $user ?>!</h1>
        <img src="<?php echo get_image($uid); ?>" />
        <p>Publica tus eventos o tareas proximas.</p>

<!--
       <form action="" method="POST" enctype="multipart/form-data">
			  <label for="imagen">Imagen:</label>
			  <input type="file" name="imagen" id="imagen" />
			  <input type="submit" name="subir" value="Subir"/>
		 </form>
-->

       <form name="buscar" action="" method="get">
            <label>	<input type="text" name="search" placeholder="Buscar..."> </label>
            <input type="submit" value="Buscar">
        </form>

        <form name="parrafo" action="core/parrafo.php" method="post">
            <label>	<input type="text" name="Parrafo" placeholder="Escribe tu evento..."> </label>
            <label> <input type="date" name="Fecha"> </label>
            <input type="submit" value="Publicar">
        </form>

			<?php
			// isset devuelve TRUE si la busuqeda existe y tiene un valor distinto de NULL, FALSE de lo contrario.
			if( isset($_GET[ 'search' ]) ){
				?>
				<a href="home.php">Ver todos </a>
				<?php
				print get_search($uid, $_GET[ 'search' ]);
			}else{
				print get_content($uid);
			}
			?>
        <p><a href="core/logout.php">Salir</a></p>
    </body>
</html>
