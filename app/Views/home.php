<?php
session_start();
?>

<h1>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h1>

<a href="/ProyectoFinal/public/login">Cerrar sesión</a>
