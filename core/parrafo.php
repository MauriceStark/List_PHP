<?php include("access_Control.php"); ?>

<?php
        // Datos de la conexion
        include("conexion.php");

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
                echo "Los datos han sido introducidos satisfactoriamente" . $sql;
                header("Location: home.php");
            }

        }else {
            echo "Error, no ha introducido todos los datos";
        }

    ?>
