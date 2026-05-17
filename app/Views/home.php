<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservaTuTurno</title>
    <link rel="icon" href="/ProyectoFinal/public/img/icono.png">
    <link rel="stylesheet" href="/ProyectoFinal/public/css/style.css">
</head>
<body>

    <?php include __DIR__ . "/partials/header.php"; ?>

    <div class="home-container">

        <h1>Bienvenido, <?= $_SESSION["usuario"] ?></h1>



        <div class="home-grid">

            <a class="home-card" href="/ProyectoFinal/public/services">
                <h2>Servicios</h2>
                <p>Consulta los servicios disponibles.</p>
            </a>

            <a class="home-card" href="/ProyectoFinal/public/reservas">
                <h2>Mis reservas</h2>
                <p>Gestiona tus citas activas o crea nuevas.</p>
            </a>

        </div>

        <br><br>

        <!-- FOTOS DEL NEGOCIO -->
        <h2>Nuestro local</h2>

        <div class="home-fotos">
            <img src="/ProyectoFinal/public/img/barberia1.png" alt="Foto del local 1">
            <img src="/ProyectoFinal/public/img/barberia2.png" alt="Foto del local 2">
        </div>

        <br><br>

        <!-- MAPA -->
<h2>Encuéntranos aquí</h2>

<div class="home-mapa">
    <a href="https://www.google.com/maps?q=<?= urlencode($_SESSION['negocio_direccion'] ?? 'Granada') ?>" target="_blank">
        <img src="/ProyectoFinal/public/img/mapa.webp" alt="Mapa ubicación">
    </a>
</div>


    </div>

</body>
</html>
