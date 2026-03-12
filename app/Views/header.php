<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="header">
    <div class="logo">
        <a href="/ProyectoFinal/public/home"><img src="/ProyectoFinal/public/img/icono.png" alt="icon"> ReservaTuTurno</a>
    </div>

    <nav class="nav">
        <a href="/ProyectoFinal/public/home">Inicio</a>
        <a href="/ProyectoFinal/public/servicios">Servicios</a>
        <a href="/ProyectoFinal/public/citas">Citas</a>
    </nav>

    <div class="usuario">
        <?php if (isset($_SESSION["usuario"])){ ?>
            <span class="nombre-usuario"><?php echo $_SESSION["usuario"]; ?></span>
        <?php } ?>
    </div>
</header>
