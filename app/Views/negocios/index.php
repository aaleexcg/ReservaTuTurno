<?php
$titulo = "Negocios";
ob_start();
?>
<h1>Selecciona un negocio</h1>

<?php if (isset($negocios) && !empty($negocios)): ?>
<?php foreach ($negocios as $negocio): ?>
    <div style="margin-bottom:20px;">
        <a href="/ProyectoFinal/public/negocios/seleccionar/<?= $negocio['id_negocio'] ?>">
            <button style="padding:10px 20px; font-size:18px;">
                <?= $negocio['nombre'] ?>
            </button>
            <img src="../../../public/img/manolis.jpeg" alt="manolissevillano">
        </a>
    </div>
<?php endforeach; ?>
<?php endif; ?>

<?php
$contenido = ob_get_clean();
require __DIR__ . "/../layout.php";