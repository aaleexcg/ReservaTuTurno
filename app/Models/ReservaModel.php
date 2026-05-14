<?php

require_once __DIR__ . '/../../config/database.php';

class ReservaModel {

    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function crear($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO reserva (id_usuario, id_servicio, id_negocio, fecha, hora)
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "iiiss",
            $data['id_usuario'],
            $data['id_servicio'],
            $data['id_negocio'],
            $data['fecha'],
            $data['hora']
        );
        return $stmt->execute();
    }

    public function reservasUsuario($id_usuario) {
        $stmt = $this->db->prepare(
            "SELECT r.*, s.nombre AS servicio
             FROM reserva r
             JOIN servicio s ON r.id_servicio = s.id_servicio
             WHERE r.id_usuario = ?
             ORDER BY r.fecha, r.hora"
        );
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cancelar($id_reserva) {
        $stmt = $this->db->prepare(
            "UPDATE reserva SET estado = 'cancelada' WHERE id_reserva = ?"
        );
        $stmt->bind_param("i", $id_reserva);
        return $stmt->execute();
    }
}
