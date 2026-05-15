<?php

require_once __DIR__ . '/../../config/database.php';

class ReservaModel {

    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function crear($data) {
        // Validar que la hora no esté ocupada
        $sql = "SELECT COUNT(*) AS total FROM reserva 
                WHERE fecha = ? AND hora = ? AND estado = 'activa'";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $data['fecha'], $data['hora']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result['total'] > 0) {
            return false; // Hora ocupada
        }

        // Insertar reserva
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

    public function todasLasReservas($negocioId) {
        global $conexion;

        $sql = "SELECT r.*, s.nombre AS servicio, u.nombre AS usuario
                FROM reserva r
                JOIN servicio s ON r.id_servicio = s.id_servicio
                JOIN usuario u ON r.id_usuario = u.id_usuario
                WHERE r.id_negocio = ?
                ORDER BY r.fecha, r.hora";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $negocioId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
public function horasOcupadas($fecha) {
    $sql = "SELECT hora FROM reserva WHERE fecha = ? AND estado = 'activa'";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("s", $fecha);
    $stmt->execute();
    $result = $stmt->get_result();

    $horas = [];
    while ($row = $result->fetch_assoc()) {
        $horas[] = $row['hora'];
    }

    return $horas;
}

}
