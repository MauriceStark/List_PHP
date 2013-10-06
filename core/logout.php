<?php
    //Reanudamos la sesion
    session_start();

    //Literalmente la destruirmos
    session_destroy();

    //Redireccionamos (al inicio de sesion)
    header("Location: ../login.html");
?>
