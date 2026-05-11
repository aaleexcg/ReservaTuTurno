<?php

require_once __DIR__ . '/../../config/database.php';

class NegocioModel {

    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function all() {
        $result = $this->db->query("SELECT * FROM negocio");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
