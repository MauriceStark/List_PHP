<html>
  <head>
  <title>Registro de empleados</title>
  <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
  </head>
  <body>
		<form name="nuevo_empleado" action="" onsubmit="enviarDatosEmpleado(); return false">
			<input name="nombre" type="text" />
				<input type="date" name="apellido">
            <input type="submit" name="Submit" value="Enviar" />
		</form>

		<div id="resultado">
			<?php include('consulta.php');?>
		</div>

    </body>
</html>
