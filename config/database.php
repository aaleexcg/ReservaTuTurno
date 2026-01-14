<?php
    $servername = "localhost"; // Nombre/IP del servidor
    $database = "reservaturno"; // Nombre de la BBDD
    $username = "root"; // Nombre del usuario
    $password = ""; // Contraseña del usuario
    // Creamos la conexión utilizando la clase Mysqli
    $conexion=new Mysqli($servername, $username, $password, $database);
    if ($conexion->connect_error){
        die ("Error en conexión base datos: ".$conexion->connect_error);
    }
?>