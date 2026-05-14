<?php
$titulo = "Cambiar nombre";
ob_start();
?>

<h1>Cambiar nombre</h1>

<form method="POST" action="/ProyectoFinal/public/usuario/cambiarNombre">
    <label>Nuevo nombre:</label>
    <input type="text" name="nombre" value="<?= $_SESSION['usuario'] ?>" required>
    <button type="submit">Guardar</button>
</form>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';
