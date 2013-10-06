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
				<p>Publica tus eventos o tareas proximas.</p>

         <form name="buscar" action="core/search.php" method="get">
            <label>	<input type="text" name="search" placeholder="Buscar..."> </label>
            <input type="submit" value="Buscar">
        </form>

        <form name="parrafo" action="core/parrafo.php" method="post">
            <label>	<input type="text" name="Parrafo" placeholder="Escribe tu evento..."> </label>
            <label> <input type="date" name="Fecha"> </label>
            <input type="submit" value="Publicar">
        </form>

        <?php print print_content($uid); ?>
        <p><a href="core/logout.php">Salir</a></p>
    </body>
</html>
