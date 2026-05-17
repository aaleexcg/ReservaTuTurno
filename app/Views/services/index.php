<?php
$titulo = "Servicios";
ob_start();
?>

<h1 class="titulo-servicios">Servicios disponibles</h1>

<?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
    <a class="btn-crear-servicio" href="/ProyectoFinal/public/services/create">Crear nuevo servicio</a>
<?php endif; ?>

<div class="servicios-grid">

<?php if (!empty($services)): ?>
    <?php foreach ($services as $service): ?>

        <div class="servicio-card">

        <img class="servicio-img" 
            src="/ProyectoFinal/public/img/servicios/<?= strtolower(str_replace(' ', '_', $service['nombre'])) ?>.jpg"
            alt="<?= $service['nombre'] ?>">


            <div class="servicio-info">
                <h2><?= $service['nombre'] ?></h2>
                <p><?= $service['descripcion'] ?></p>

                <p class="servicio-detalle">
                    ⏱ <?= $service['duracion_minutos'] ?> min  
                    •  
                     <?= $service['precio'] ?> €
                </p>

                <div class="servicio-botones">

                    <a href="/ProyectoFinal/public/reservas?id_servicio=<?= $service['id_servicio'] ?>" 
                       class="btn-reservar">Reservar</a>

                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <a href="/ProyectoFinal/public/services/edit/<?= $service['id_servicio'] ?>" 
                           class="btn-editar">Editar</a>

                        <form action="/ProyectoFinal/public/services/delete/<?= $service['id_servicio'] ?>" 
                              method="POST">
                            <button class="btn-eliminar" type="submit">Eliminar</button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>

        </div>

    <?php endforeach; ?>
<?php else: ?>
    <p>No hay servicios disponibles.</p>
<?php endif; ?>

</div>

<?php
$contenido = ob_get_clean();
require __DIR__ . "/../layout.php";
?>
