
<header class="header">
    <div class="logo">
        <a href="/ProyectoFinal/public/home"><img src="/ProyectoFinal/public/img/icono.png" alt="icon"> ReservaTuTurno</a>
    </div>

    <?php if(empty($ocultarMenu)){?>
    <nav class="nav">
        <a href="/ProyectoFinal/public/home">Inicio</a>
        <a href="/ProyectoFinal/public/services">Servicios</a>
        <a href="/ProyectoFinal/public/reservas">Citas</a>
    </nav>
    <?php } ?>
   
    <div class="usuario">
        <?php if (isset($_SESSION["usuario"])): ?>
            
            <div class="user-menu">
                <span class="nombre-usuario" onclick="toggleUserMenu()">
                    <?= $_SESSION["usuario"] ?>
                </span>

                <div id="userDropdown" class="dropdown-menu" style="display:none;">

                    <!-- Si es admin, mostramos opciones extra -->
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <a href="/ProyectoFinal/public/services">Gestionar servicios</a>
                    <?php endif; ?>

                    <a href="/ProyectoFinal/public/usuario/cambiarNombre">Cambiar nombre</a>
                    <a href="/ProyectoFinal/public/logout">Cerrar sesión</a>
                </div>
            </div>

        <?php endif; ?>
    </div>

    <script>
    function toggleUserMenu() {
        const menu = document.getElementById("userDropdown");
        menu.style.display = menu.style.display === "none" ? "block" : "none";
    }
    </script>

</header>
