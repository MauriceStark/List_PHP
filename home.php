<?php include("access_Control.php"); ?>
<html>
    <head>
        <title>Pagina Usuario</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
    <body>
        <h1>Bienvenido al sistema!</h1>
        <h2>Usuario: <?php echo $_SESSION["usuarioactual"] ?> </h2><br>
        <h2>USER ID: <?php echo $_SESSION["uid"] ?> </h2><br>
        <p>Entro correctamente al sistema.</p><br><br>
        
        <form name="parrafo" action="parrafo.php" method="post">
        <label>Parrafo:      <input type="text" name="Parrafo">      </label>
        <input type="submit" value="Enviar">
        </form>
        
        <?php
        //conexion a la base de datos
        include("conexion.php");
        
        //la conexión con la base de datos en MySQL 
        $conexion = mysql_connect( $host,$user,$password );
        mysql_select_db( $DBname,$conexion );
        
        $uid = $_SESSION["uid"];
        //vamos a crear nuestra consulta SQL
        $consulta = "SELECT texto,pid FROM parrafos WHERE uid = $uid";
        //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
        //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
        $resultado= @mysql_query($consulta) or die(mysql_error());

        //si el resultado fue exitoso
        //obtendremos los datos que ha devuelto la base de datos
        //y con un ciclo recorreremos todos los resultados
        while ($datos = @mysql_fetch_assoc($resultado) ){

            //ahora solamente debemos mostrar la imagen
            echo "<p>". $datos['texto']. "</p><br>";
            $pid = $datos['pid'];
            echo  "<a href='delete.php?pid=$pid'>Eliminar </a>";
            echo  "<a href='disable.php?pid=$pid'>Desabilitar </a>";
            echo  "<a href='enable.php?pid=$pid'>Habilitar </a>";
            
        }

        ?>

        <a href="logout.php">Salir</a>
    </body>
</html>