<?php

    //Reanudamos la sesión
    @session_start();
    //Validamos si existe realmente una sesión activa o no
    if($_SESSION["autentica"] != "logueado"){
        //Si no hay sesión activa, lo direccionamos
        header("Location: ../login.html");
        exit();
    }

    //Guardamos el Id y el nombre del usuario logueado
    $user 	= $_SESSION["user"];
    $uid		= $_SESSION["uid"];
?>
