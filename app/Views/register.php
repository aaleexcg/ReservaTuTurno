<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="/ProyectoFinal/public/css/login.css">
</head>
<body>
    <div class="image">
        <img src="/ProyectoFinal/public/img/icono.png" alt="">
    </div>
    <div class="loginContainer">
        <h1>Crear cuenta</h1>

        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="/ProyectoFinal/public/register" method="post">
            Nombre:
            <input type="text" name="nombre" required>

            Email:
            <input type="email" name="email" required>

            Contraseña:
            <input type="password" name="password" required>

            <button type="submit">Registrarse</button>
        </form>

        <a href="/ProyectoFinal/public/login">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</body>
</html>