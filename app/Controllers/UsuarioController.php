<?php

require_once __DIR__ . "/../Models/UsuarioModel.php";

class UsuarioController {

    public function mostrarLogin() {
        require __DIR__ . "/../Views/login.php";
    }

    public function mostrarRegister() {
        require __DIR__ . "/../Views/register.php";
    }

    public function login() {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $usuario = UsuarioModel::buscarPorEmail($email);

        if ($usuario && password_verify($password, $usuario["contrasena_hash"])) {
            session_start();
            $_SESSION["usuario"] = $usuario["nombre"];
            header("Location: /ProyectoFinal/public/home");
            exit;
        } else {
            $error = "Credenciales incorrectas";
            require __DIR__ . "/../Views/login.php";
        }
    }

    public function register() {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        if (UsuarioModel::crearUsuario($nombre, $email, $passwordHash)) {
            header("Location: /ProyectoFinal/public/login");
            exit;
        } else {
            $error = "Error al registrar usuario";
            require __DIR__ . "/../Views/register.php";
        }
    }

    public function home() {
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("Location: /ProyectoFinal/public/login");
            exit;
        }

        require __DIR__ . "/../Views/home.php";
    }
}
