<?php

require_once __DIR__ . "/../app/Controllers/UsuarioController.php";

$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$controller = new UsuarioController();
// Rutas GET
if ($uri === "/ProyectoFinal/public/" || $uri === "/ProyectoFinal/public") {
    header("Location: /ProyectoFinal/public/login");
    exit;
}

if ($uri === "/ProyectoFinal/public/login" && $method === "GET") {
    $controller->mostrarLogin();
    exit;
}

if ($uri === "/ProyectoFinal/public/register" && $method === "GET") {
    $controller->mostrarRegister();
    exit;
}

if (strpos($uri, "/ProyectoFinal/public/home") === 0 && $method === "GET") {
    $controller->home();
    exit;
}

if ($uri === "/ProyectoFinal/public/logout" && $method === "GET") {
    $controller->logout();
    exit;
}

// Rutas POST
if ($uri === "/ProyectoFinal/public/login" && $method === "POST") {
    $controller->login();
    exit;
}

if ($uri === "/ProyectoFinal/public/register" && $method === "POST") {
    $controller->register();
    exit;
}

echo "<h1>404 - Página no encontrada</h1>";
