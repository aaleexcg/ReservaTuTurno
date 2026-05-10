<h1>Editar servicio</h1>

<form action="/ProyectoFinal/public/services/update/<?= $service['id_servicio'] ?? '' ?>" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $service['nombre'] ?? '' ?>" required><br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required><?= $service['descripcion'] ?? '' ?></textarea><br><br>

    <label>Duración (minutos):</label>
    <input type="number" name="duracion_minutos" value="<?= $service['duracion_minutos'] ?? '' ?>" required><br><br>

    <label>Precio (€):</label>
    <input type="number" step="0.01" name="precio" value="<?= $service['precio'] ?? '' ?>" required><br><br>

    <label>Activo:</label>
    <input type="checkbox" name="activo" <?= ($service['activo'] ?? false) ? 'checked' : '' ?>><br><br>

    <button type="submit">Actualizar</button>
</form>
