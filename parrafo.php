<?php include("access_Control.php"); ?>
<?php
        // Datos de la conexion
        include("conexion.php");
        
        // Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
        $full = !empty( $_POST[ 'Parrafo' ] );
       
        if( $full ){      
            // Si entramos es que todo se ha realizado correctamente
            $conexion = mysql_connect( $host,$user,$password );
            mysql_select_db( $DBname,$conexion );
            $uid= $_SESSION["uid"];
            // Con esta sentencia SQL insertaremos los datos en la base de datos
            $sql = " INSERT INTO parrafos ( uid, texto )
                     VALUES (   '$uid',
                                '{$_POST['Parrafo']}')";
            
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