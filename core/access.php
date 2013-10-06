<?php
    include("conexion.php");
    include("functions.php");
   //Se utiliza la función htmlentities para evitar inyecciones SQL.
    $query_user =   mysql_query( "SELECT USER FROM $TABLA WHERE USER = '" . htmlentities( $_POST["NickName"] ) . "'",$conexion);
    $rows_user  =   mysql_num_rows( $query_user ); //devuelve el numero de filas de la consulta

    //Si existe el usuario, validamos también la contraseña ingresada
    if($rows_user != 0){

        $sql = "SELECT USER
                FROM $TABLA
                WHERE
                USER            =   '" .      htmlentities( $_POST["NickName"]) . "'
                and PASSWORD    =   '" . md5( htmlentities( $_POST["Password"]) ) . "'";

        $query_access   =   mysql_query( $sql,$conexion );
        $result         =   mysql_num_rows( $query_access );

        //Si el usuario y clave ingresado son correctos
        if($result != 0){

            session_start();

            //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no “logueado” un usuario
            $_SESSION["autentica"] = "logueado";

            $_SESSION["user"] = mysql_result($query_access,0,0); //nombre del usuario logueado.

            $uid = mysql_result(mysql_query("SELECT ID FROM tabla_registro WHERE USER = '" . htmlentities( $_POST["NickName"] ) . "'",$conexion),0,0);

            $_SESSION["uid"] = $uid;

            //Direccionamos a nuestra página principal del sistema.
            header( "Location: ../home.php" );
        }
        else{
            set_message("El nombre de usuario o la contraseña no son correctos.");
        }
    }else{
         set_message("El nombre de usuario o la contraseña no son correctos.");
    }

    mysql_close($conexion);


?>


