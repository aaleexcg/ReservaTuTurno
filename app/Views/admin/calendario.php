
<?php
$titulo = "Calendario de reservas";
ob_start();
?>

<h1>Calendario de reservas</h1>

<div id="calendar"></div>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'dayGridMonth',
        events: '/ProyectoFinal/public/admin/reservas-json'
    });

    calendar.render();
});
</script>

<?php
$contenido = ob_get_clean();
require __DIR__ . '/../layout.php';
