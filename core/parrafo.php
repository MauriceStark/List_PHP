
<?php
        // Datos de la conexion
        include("access_Control.php");
        include("conexion.php");
        include("functions.php");

        // Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
        $full = !empty( $_POST[ 'Parrafo' ] );

        if( $full ){
            // Con esta sentencia SQL insertaremos los datos en la base de datos
            $sql = " INSERT INTO parrafos ( uid, texto, fecha )
                     VALUES (   '$uid',
                                '{$_POST['Parrafo']}',
                                '{$_POST['Fecha']}')";

            mysql_query( $sql,$conexion );
            $error = mysql_error( $conexion );

            if( !empty($error) ){
                echo "Ha habido un error al insertar los valores. $error";
            } else {
                //echo "Los datos han sido introducidos satisfactoriamente" . $sql;
            }

        }else {
            echo "<div class='error-parrafo'>Error, no ha introducido todos los datos</div>";
        }
      
       print get_content($uid);
?>
