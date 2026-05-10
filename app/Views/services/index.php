<h1>Servicios</h1>

<a href="/ProyectoFinal/public/services/create">Crear nuevo servicio</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Duración</th>
        <th>Precio</th>
        <th>Activo</th>
        <th>Acciones</th>
    </tr>

    <?php if (isset($services) && !empty($services)): ?>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><?= $service['id_servicio'] ?></td>
                <td><?= $service['nombre'] ?></td>
                <td><?= $service['descripcion'] ?></td>
                <td><?= $service['duracion_minutos'] ?> min</td>
                <td><?= $service['precio'] ?> €</td>
                <td><?= $service['activo'] ? 'Sí' : 'No' ?></td>
                <td>
                    <a href="/ProyectoFinal/public/services/edit/<?= $service['id_servicio'] ?>">Editar</a>

                    <form action="/ProyectoFinal/public/services/delete/<?= $service['id_servicio'] ?>" method="POST" style="display:inline;">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No hay servicios disponibles.</td>
        </tr>
    <?php endif; ?>
</table>
