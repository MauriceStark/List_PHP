<?php
        // Datos de la conexion
        include("conexion.php");

        // Primero comprobamos que ningún campo esté vacío y que todos los campos existan.

       $full =  !empty( $_POST[ 'NickName'  ])   &&
                !empty( $_POST[ 'Password'  ])   &&
                !empty( $_POST[ 'Email'     ]);

        if( $full ){

            // Con esta sentencia SQL insertaremos los datos en la base de datos
            $sql = " INSERT INTO $TABLA ( USER,PASSWORD,EMAIL )
                     VALUES (   '{$_POST['NickName']}',
                            MD5('{$_POST['Password']}'),
                                '{$_POST['Email']}'		)";

            mysql_query( $sql,$conexion );
            $error = mysql_error( $conexion );

            if( !empty($error) ){
                echo "Ha habido un error al insertar los valores. $error";
            } else {
                header("Location: ../login.html");
            }

        }else {
            echo "Error, no ha introducido todos los datos";
        }

    ?>
