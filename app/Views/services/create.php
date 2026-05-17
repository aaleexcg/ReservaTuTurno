<?php
$titulo = "Crear servicio";
ob_start();
?>

<h1>Crear servicio</h1>

<div class="crear-servicio-container">

    <form action="/ProyectoFinal/public/services/create" method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>

        <label>Duración (minutos):</label>
        <input type="number" name="duracion_minutos" required>

        <label>Precio (€):</label>
        <input type="number" step="0.01" name="precio" required>

        <label>Activo:</label>
        <input type="checkbox" name="activo" checked>

        <button type="submit">Crear servicio</button>

    </form>

</div>

<?php
$contenido = ob_get_clean();
require __DIR__ . "/../layout.php";
?>
