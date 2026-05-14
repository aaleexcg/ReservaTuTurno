<?php
$titulo = "Citas";
ob_start();
?>
<div class="reservas-container">
<h1>Mis reservas</h1>

<?php $reservas = $reservas ?? []; foreach ($reservas as $r): ?>
    <div style="margin-bottom:15px;">
        <strong><?= $r['servicio'] ?></strong><br>
        Fecha: <?= $r['fecha'] ?><br>
        Hora: <?= $r['hora'] ?><br>
        Estado: <?= $r['estado'] ?><br>

        <?php if ($r['estado'] === 'activa'){ ?>
            <a href="/ProyectoFinal/public/reservas/cancelar/<?= $r['id_reserva'] ?>">
                <button>Cancelar</button>
            </a>
        <?php } ?>
    </div>
<?php endforeach; ?>
<h1>Crear reserva</h1>

<form action="/ProyectoFinal/public/reservas/guardar" method="POST">

    <label>Servicio:</label>
        <select name="id_servicio" required>
            <?php foreach ($servicios ?? [] as $s): ?>
                <option value="<?= $s['id_servicio'] ?>"
                    <?= (isset($_GET['id_servicio']) && $_GET['id_servicio'] == $s['id_servicio']) ? 'selected' : '' ?>>
                    <?= $s['nombre'] ?> (<?= $s['precio'] ?> €)
                </option>
            <?php endforeach; ?>
        </select>

    <br><br>

    <label>Fecha:</label>
    <input type="date" name="fecha" required>

    <br><br>

    <label>Hora:</label>
    <input type="time" name="hora" required>

    <br><br>

    <button type="submit">Reservar</button>
</form>
</div>
<?php
$contenido = ob_get_clean();
require __DIR__ . "/../layout.php";