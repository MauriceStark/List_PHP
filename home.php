<?php 
    //conexion a la base de datos
    include("conexion.php");
    include("access_Control.php");
    include("functions.inc"); 
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
        
        <form name="parrafo" action="parrafo.php" method="post">
            <label>Parrafo:      <input type="text" name="Parrafo"> </label>
            <label>Fecha:      <input type="date" name="Fecha"> </label>
            <input type="submit" value="Enviar">
        </form>
        
        <?php print print_content($uid); ?>

        <a href="logout.php">Salir</a>
    </body>
</html>