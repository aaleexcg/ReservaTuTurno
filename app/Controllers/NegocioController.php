<?php

require_once __DIR__ . '/../Models/NegocioModel.php';

class NegocioController {

    public function index() {
        $model = new NegocioModel();
        $negocios = $model->all();
        $ocultarMenu = true; 
        require __DIR__ . '/../Views/negocios/index.php';
    }

    public function seleccionar($id) {
        $_SESSION['negocio_id'] = $id;
        header("Location: /ProyectoFinal/public/home");
        exit;
    }

    
}
