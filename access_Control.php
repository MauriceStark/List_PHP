<?php
    
    //Reanudamos la sesión
    @session_start();
    //Validamos si existe realmente una sesión activa o no
    if($_SESSION["autentica"] != "SIP"){
        //Si no hay sesión activa, lo direccionamos
        header("Location: login.html");
        exit();
    }

?>