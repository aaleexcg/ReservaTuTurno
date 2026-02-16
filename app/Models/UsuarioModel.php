<?php

require_once __DIR__ . "/../../config/database.php";

class UsuarioModel {

    public static function crearUsuario($nombre, $email, $hash) {
        global $conexion;

        $stmt = $conexion->prepare(
            "INSERT INTO usuario (nombre, email, contrasena_hash, rol, creado_en, actualizado_en)
             VALUES (?, ?, ?, 'usuario', NOW(), NOW())"
        );

        $stmt->bind_param("sss", $nombre, $email, $hash);

        return $stmt->execute();
    }

    public static function buscarPorEmail($email) {
        global $conexion;

        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
