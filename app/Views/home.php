<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="/ProyectoFinal/public/img/icono.png">
    <link rel="stylesheet" href="/ProyectoFinal/public/css/home.css">
    <link rel="stylesheet" href="/ProyectoFinal/public/css/header.css">
</head>
<body>
    <?php include __DIR__ . "/header.php"; ?>
        
    <h1>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h1>

    <a href="/ProyectoFinal/public/logout">Cerrar sesión</a>

</body>
</html>