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
            $_SESSION["usuario"] = $usuario["nombre"];
            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION['rol'] = $usuario['rol'];
            header("Location: /ProyectoFinal/public/negocios");
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
            $_SESSION["usuario"] = $nombre;
            header("Location: /ProyectoFinal/public/home");
            exit;
        } else {
            $error = "Error al registrar usuario";
            require __DIR__ . "/../Views/register.php";
        }
    }

    public function home() {
        if (!isset($_SESSION["usuario"])) {
            header("Location: /ProyectoFinal/public/login");
            exit;
        }

        require __DIR__ . "/../Views/home.php";
    }

    public function logout(){
        session_unset();
        session_destroy();

        header("Location: /ProyectoFinal/public/login");
        exit();
    }

    public function cambiarNombreForm() {
        require __DIR__ . '/../Views/usuario/cambiarNombre.php';
    }

    public function cambiarNombre() {
        $nuevoNombre = $_POST['nombre'];
        $id = $_SESSION['id_usuario'];

        UsuarioModel::actualizarNombre($id, $nuevoNombre);

        // Actualizar la sesión
        $_SESSION['usuario'] = $nuevoNombre;

        header("Location: /ProyectoFinal/public/home");
        exit;
    }

}
