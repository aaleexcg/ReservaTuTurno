<?php

require_once __DIR__ . '/../Models/ServiceModel.php';
require_once __DIR__ . '/../../config/database.php';

class ServiceController {

    private $service;

    public function __construct() {
        // NO usar $db, NO pasar parámetros
        $this->service = new ServiceModel();
    }

    public function index() {
        $services = $this->service->all();
        require __DIR__ . '/../Views/services/index.php';
    }

    public function createForm() {
        require __DIR__ . '/../Views/services/create.php';
    }

    public function create() {
        $data = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'duracion_minutos' => $_POST['duracion_minutos'],
            'activo' => isset($_POST['activo']) ? 1 : 0
        ];

        $this->service->create($data);
        header("Location: /ProyectoFinal/public/services");
    }

    public function editForm($id) {
        $service = $this->service->find($id);
        require __DIR__ . '/../Views/services/edit.php';
    }

    public function update($id) {
        $data = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'duracion_minutos' => $_POST['duracion_minutos'],
            'activo' => isset($_POST['activo']) ? 1 : 0
        ];

        $this->service->update($id, $data);
        header("Location: /ProyectoFinal/public/services");
    }

    public function delete($id) {
        $this->service->delete($id);
        header("Location: /ProyectoFinal/public/services");
    }
}
