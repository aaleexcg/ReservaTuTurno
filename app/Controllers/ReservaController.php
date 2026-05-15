<?php

    function generarHorasDisponibles() {
        $horas = [];

        // Mañana
        $inicioManana = strtotime("08:30");
        $finManana = strtotime("13:00");

        for ($t = $inicioManana; $t <= $finManana; $t += 30 * 60) {
            $horas[] = date("H:i", $t);
        }

        // Tarde
        $inicioTarde = strtotime("16:00");
        $finTarde = strtotime("19:30");

        for ($t = $inicioTarde; $t <= $finTarde; $t += 30 * 60) {
            $horas[] = date("H:i", $t);
        }

        return $horas;
    }

require_once __DIR__ . '/../Models/ReservaModel.php';
require_once __DIR__ . '/../Models/ServiceModel.php';

class ReservaController {

    // Mostrar formulario para crear una reserva
   /* public function crear() {
        $serviceModel = new ServiceModel();
        $servicios = $serviceModel->all();

        require __DIR__ . '/../Views/reservas/index.php';
    }*/

    // Guardar la reserva en la base de datos
    public function guardar() {
        $model = new ReservaModel();

        $data = [
            'id_usuario' => $_SESSION['id_usuario'],
            'id_servicio' => $_POST['id_servicio'],
            'id_negocio' => $_SESSION['negocio_id'],
            'fecha' => $_POST['fecha'],
            'hora' => $_POST['hora']
        ];

        if (!$model->crear($data)) {
            $_SESSION['error'] = "La hora seleccionada ya está ocupada.";
            header("Location: /ProyectoFinal/public/reservas?fecha=".$data['fecha']);
            exit;
        }
        header("Location: /ProyectoFinal/public/reservas");
        exit;
    }

    // Listar reservas del usuario
    public function index() {
        $reservaModel = new ReservaModel();
        $serviceModel = new ServiceModel();

        // Reservas del usuario
        $reservas = $reservaModel->reservasUsuario($_SESSION['id_usuario']);

        // Servicios disponibles
        $servicios = $serviceModel->all();

        // Fecha seleccionada (si no hay GET, usa hoy)
        $fechaSeleccionada = $_GET['fecha'] ?? date("Y-m-d");

        // Horas disponibles según horario
        $horasDisponibles = generarHorasDisponibles();

        // Horas ocupadas en esa fecha
        $horasOcupadas = $reservaModel->horasOcupadas($fechaSeleccionada);

        // Enviar todo a la vista
        require __DIR__ . '/../Views/reservas/index.php';
    }

    // Cancelar una reserva
    public function cancelar($id)
    {
        $model = new ReservaModel();
        $model->cancelar($id);

        header("Location: /ProyectoFinal/public/reservas");
        exit;
    }


    public function calendarioAdmin() {
        require __DIR__ . '/../Views/admin/calendario.php';
    }

    public function reservasJson() {
        $model = new ReservaModel();
        $reservas = $model->todasLasReservas($_SESSION['negocio_id']);

        $eventos = [];

        foreach ($reservas as $r) {
            $eventos[] = [
                "title" => $r['servicio'] . " - " . $r['usuario'],
                "start" => $r['fecha'] . "T" . $r['hora'],
                "end"   => $r['fecha'] . "T" . $r['hora']
            ];
        }

        return $eventos;
    }


}
