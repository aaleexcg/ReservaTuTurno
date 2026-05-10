<h1>Crear servicio</h1>

<form action="/ProyectoFinal/public/services/create" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required></textarea><br><br>

    <label>Duración (minutos):</label>
    <input type="number" name="duracion_minutos" required><br><br>
    
    <label>Precio (€):</label>
    <input type="number" step="0.01" name="precio" required><br><br>

    <label>Activo:</label>
    <input type="checkbox" name="activo" checked><br><br>

    <button type="submit">Crear</button>
</form>
