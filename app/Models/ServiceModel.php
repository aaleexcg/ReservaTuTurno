<?php

require_once __DIR__ . "/../../config/database.php";

class ServiceModel {

    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function all() {
        $result = $this->db->query("SELECT * FROM servicio");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM servicio WHERE id_servicio = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO servicio (nombre, descripcion, duracion_minutos, precio, activo)
            VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "ssidi",
            $data['nombre'],
            $data['descripcion'],
            $data['duracion_minutos'],
            $data['precio'],
            $data['activo']
        );
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare(
            "UPDATE servicio
            SET nombre = ?, descripcion = ?, duracion_minutos = ?, precio = ?, activo = ?
            WHERE id_servicio = ?"
        );
        $stmt->bind_param(
            "ssidii",
            $data['nombre'],
            $data['descripcion'],
            $data['duracion_minutos'],
            $data['precio'],
            $data['activo'],
            $id
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM servicio WHERE id_servicio = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
