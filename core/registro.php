<?php
        // Datos de la conexion
        include("conexion.php");
        include("functions.php");

        // Primero comprobamos que ningún campo esté vacío y que todos los campos existan.

       $full =  !empty( $_POST[ 'NickName'  ])   &&
                !empty( $_POST[ 'Password'  ])   &&
                !empty( $_POST[ 'Email'     ]);

        if( $full ){

			  	//Se utiliza la función htmlentities para evitar inyecciones SQL.
				$query_user =   mysql_query( "SELECT USER FROM $TABLA WHERE USER = '" . htmlentities( $_POST["NickName"] ) . "'",$conexion);
				$rows_user  =   mysql_num_rows( $query_user ); //devuelve el numero de filas de la consulta

            if($rows_user == 0){
					// Con esta sentencia SQL insertaremos los datos en la base de datos
					$sql = " INSERT INTO $TABLA ( USER,PASSWORD,EMAIL )
								VALUES (   '{$_POST['NickName']}',
										 MD5('{$_POST['Password']}'),
											  '{$_POST['Email']}'	)";
					mysql_query( $sql,$conexion );
					$error = mysql_error( $conexion );

               if( !empty($error) ){
               	set_message_error( "Ha habido un error al insertar los valores.");
					} else {
						header("Location: ../login.html");
					}

            }else{
            	set_message_error( "El Nombre de usuario ya esta en uso, intente con otro.");
            }

        }else{
            set_message_error("Error, no ha introducido todos los datos");
        }

    ?>
