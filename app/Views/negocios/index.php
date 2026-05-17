<?php
$titulo = "Negocios";
ob_start();
?>

<h1 class="titulo-negocios">Selecciona un negocio</h1>

<div class="negocios-container">

<?php if (isset($negocios) && !empty($negocios)): ?>
    <?php foreach ($negocios as $negocio): ?>
        
        <div class="negocio-card">

            <img class="negocio-img" src="/ProyectoFinal/public/img/barberia1.png" alt="Imagen negocio">

            <div class="negocio-info">
                <h2><?= $negocio['nombre'] ?></h2>

                <p class="negocio-descripcion">
                    <?= $negocio['descripcion'] ?? "Barbería profesional con años de experiencia." ?>
                </p>

                <a href="/ProyectoFinal/public/negocios/seleccionar/<?= $negocio['id_negocio'] ?>">
                    <button class="btn-seleccionar">Entrar</button>
                </a>
            </div>

        </div>

    <?php endforeach; ?>
<?php endif; ?>

</div>

<?php
$contenido = ob_get_clean();
require __DIR__ . "/../layout.php";
?>
