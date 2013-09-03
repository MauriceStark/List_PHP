<?php
//conexion a la base de datos
include("conexion.php");

//vamos a crear nuestra consulta SQL
$consulta = "SELECT imagen FROM imagenes";
//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
$resultado= @mysql_query($consulta) or die(mysql_error());

//si el resultado fue exitoso
//obtendremos los datos que ha devuelto la base de datos
//y con un ciclo recorreremos todos los resultados
while ($datos = @mysql_fetch_assoc($resultado) ){
  //ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
  $ruta = "imagenes/" . $datos['imagen'];

  //ahora solamente debemos mostrar la imagen
  echo "<img width=100 height=100 style='border-radius:100%;' src='$ruta' />";
}

?>