 <?php
    // Datos de la conexion
    $HOST       =   "localhost" ;
    $USER       =   "root";
    $PASSWORD   =   "maurice";
    $DB         =   "registro";
    $TABLA      =   "tabla_registro";

    /*
        ID
        USER
        PASSWORD
        EMAIL
    */

    //la conexión con la base de datos en MySQL
    $conexion = mysql_connect( $HOST,$USER,$PASSWORD );
    mysql_select_db( $DB,$conexion );

?>
