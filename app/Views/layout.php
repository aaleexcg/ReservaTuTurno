<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?? 'ReservaTuTurno' ?></title>
    <link rel="stylesheet" href="/ProyectoFinal/public/css/style.css">
    <link rel="icon" href="/ProyectoFinal/public/img/icono.png">
</head>

<body>

    <?php require __DIR__ . "/partials/header.php"; ?>

    <main class="contenido">
        <?= $contenido ?? '' ?>
    </main>

    <?php require __DIR__ . "/partials/footer.php"; ?>

</body>
</html>
