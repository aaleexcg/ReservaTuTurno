<?php

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

        $model->crear($data);

        header("Location: /ProyectoFinal/public/reservas");
        exit;
    }

    // Listar reservas del usuario
    public function index() {
        $model = new ReservaModel();
        $reservas = $model->reservasUsuario($_SESSION['id_usuario']);
        
        $serviceModel = new ServiceModel();
        $servicios = $serviceModel->all();
        require __DIR__ . '/../Views/reservas/index.php';
    }

    // Cancelar una reserva
    public function cancelar($id) {
        $model = new ReservaModel();
        $model->cancelar($id);

        header("Location: /ProyectoFinal/public/reservas");
        exit;
    }
}
