<?php
    //conexion a la base de datos
    include("core/conexion.php");
    include("core/access_Control.php");
    include("core/functions.php");
?>
<html>
    <head>
        <title>Pagina Usuario</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
    <body>
        <h1>Bienvenido al sistema!</h1>
        <h2>Usuario: <?php echo $user ?> </h2><br>
        <h2>USER ID: <?php echo $uid ?> </h2><br>
        <p>Entro correctamente al sistema.</p><br><br>

        <form name="parrafo" action="core/parrafo.php" method="post">
            <label>Parrafo:      <input type="text" name="Parrafo"> </label>
            <label>Fecha:      <input type="date" name="Fecha"> </label>
            <input type="submit" value="Enviar">
        </form>

        <?php print print_content($uid); ?>

        <a href="core/logout.php">Salir</a>
    </body>
</html>
