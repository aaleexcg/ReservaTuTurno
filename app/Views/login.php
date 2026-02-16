<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/ProyectoFinal/public/css/login.css">
</head>
<body>
    
<div class="loginContainer">
    <h1>Iniciar sesión</h1>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="/ProyectoFinal/public/login" method="post">
        Email:
        <input type="email" name="email" required>

        Contraseña:
        <input type="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>

    <a href="/ProyectoFinal/public/register">¿No tienes cuenta? Regístrate</a>
</div>
</body>
</html>