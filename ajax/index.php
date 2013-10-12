<html>
  <head>
  <title>Registro de empleados</title>
  <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
  </head>
  <body>
		<form name="form_List" action="" onsubmit="enviarDatos(); return false">
			<input name="texto" type="text" />
				<input type="date" name="fecha">
            <input type="submit" name="Submit" value="Enviar" />
		</form>

		<div id="resultado">
			<?php include('consulta.php');?>
		</div>

    </body>
</html>
