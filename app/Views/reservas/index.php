<?php
$titulo = "Citas";
ob_start();
?>

<div class="reservas-grid">

    <!-- COLUMNA IZQUIERDA -->
    <div class="col-izquierda">

        <h1>Mis reservas</h1>

        <?php
            $activas = [];
            $otras = [];

            $ahora = strtotime(date("Y-m-d H:i"));

            foreach ($reservas ?? [] as $r) {

                $fechaHora = strtotime($r['fecha'] . ' ' . $r['hora']);

                if ($r['estado'] === 'activa' && $fechaHora >= $ahora) {
                    $activas[] = $r;
                } else {
                    $otras[] = $r;
                }
            }
        ?>


        <!-- RESERVAS ACTIVAS -->
        <div class="reservas-lista">
            <?php foreach ($activas as $r): ?>
                <div class="reserva-card">
                    <strong><?= $r['servicio'] ?></strong><br>
                    Fecha: <?= $r['fecha'] ?><br>
                    Hora: <?= $r['hora'] ?><br>
                    Estado: <?= $r['estado'] ?><br>

                    <a href="/ProyectoFinal/public/reservas/cancelar/<?= $r['id_reserva'] ?>">
                        <button>Cancelar</button>
                    </a>
                </div>
            <?php endforeach; ?>

            <?php if (empty($activas)): ?>
                <p>No tienes reservas activas.</p>
            <?php endif; ?>
        </div>

        <br>

        <!-- DESPLEGABLE PARA RESERVAS PASADAS / CANCELADAS -->
        <details class="desplegable-reservas">
            <summary>Ver reservas pasadas / canceladas</summary>

            <div class="reservas-lista" style="margin-top:15px;">
                <?php foreach ($otras as $r): ?>
                    <div class="reserva-card" style="opacity:0.7;">
                        <strong><?= $r['servicio'] ?></strong><br>
                        Fecha: <?= $r['fecha'] ?><br>
                        Hora: <?= $r['hora'] ?><br>
                        Estado: <?= $r['estado'] ?><br>
                    </div>
                <?php endforeach; ?>

                <?php if (empty($otras)): ?>
                    <p>No tienes reservas pasadas o canceladas.</p>
                <?php endif; ?>
            </div>
        </details>

        <br><br>

        <h1>Crear reserva</h1>
        <?php if (!empty($_SESSION['error'])): ?>
            <p class="error"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

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
            <input type="date" name="fecha" value="<?= $fechaSeleccionada ?? date('Y-m-d') ?>" 
                onchange="window.location='?fecha='+this.value">
            
            <button type="submit">Reservar</button>

    </div>

            <!-- COLUMNA DERECHA -->
            <div class="col-derecha">
                <h2>Horas disponibles</h2>

                <?php $horasDisponibles = $horasDisponibles ?? []; ?>
                <?php $horasOcupadas = $horasOcupadas ?? []; ?>

                <div class="horas-calendario">
                    <?php foreach ($horasDisponibles as $hora): ?>
                        <?php if (!in_array($hora, $horasOcupadas)): ?>
                            <label class="hora-item">
                                <input type="radio" name="hora" value="<?= $hora ?>">
                                <span><?= $hora ?></span>
                            </label>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>
            </div>
            <br><br>

        </form>

</div>

<?php 
$contenido = ob_get_clean();
require __DIR__ . "/../layout.php";
?>
