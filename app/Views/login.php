<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="/ProyectoFinal/public/img/icono.png">
    <link rel="stylesheet" href="/ProyectoFinal/public/css/login.css">
</head>
<body>

    <div class="login-wrapper">

        <div class="login-box">

            <img class="login-logo" src="/ProyectoFinal/public/img/icono.png" alt="Logo">

            <h1>Iniciar sesión</h1>

            <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

            <form action="/ProyectoFinal/public/login" method="post">

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="input-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn-login">Entrar</button>

            </form>

            <a class="register-link" href="/ProyectoFinal/public/register">
                ¿No tienes cuenta? Regístrate
            </a>

        </div>

    </div>

</body>
</html>
