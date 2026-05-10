<?php

require_once __DIR__ . "/../app/Controllers/UsuarioController.php";
require_once __DIR__ . "/../app/Controllers/ServiceController.php";
require_once __DIR__ . '/../config/auth.php';

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

// LISTAR SERVICIOS
if (strpos($uri, "/ProyectoFinal/public/services") === 0 && $method === "GET") {
    // Evitar que /services/create o /services/edit entren aquí
    if ($uri === "/ProyectoFinal/public/services" || $uri === "/ProyectoFinal/public/services/") {
        $serviceController = new ServiceController();
        $serviceController->index();
        exit;
    }
}

// FORMULARIO CREAR SERVICIO
if ($uri === "/ProyectoFinal/public/services/create" && $method === "GET") {
    requireAdmin();
    $serviceController = new ServiceController();
    $serviceController->createForm();
    exit;
}

// FORMULARIO EDITAR SERVICIO
if (strpos($uri, "/ProyectoFinal/public/services/edit/") === 0 && $method === "GET") {
    requireAdmin();
    $id = basename($uri);
    $serviceController = new ServiceController();
    $serviceController->editForm($id);
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

// CREAR SERVICIO
if ($uri === "/ProyectoFinal/public/services/create" && $method === "POST") {
    requireAdmin();
    $serviceController = new ServiceController();
    $serviceController->create();
    exit;
}

// ACTUALIZAR SERVICIO
if (strpos($uri, "/ProyectoFinal/public/services/update/") === 0 && $method === "POST") {
    requireAdmin();
    $id = basename($uri);
    $serviceController = new ServiceController();
    $serviceController->update($id);
    exit;
}

// ELIMINAR SERVICIO
if (strpos($uri, "/ProyectoFinal/public/services/delete/") === 0 && $method === "POST") {
    requireAdmin();
    $id = basename($uri);
    $serviceController = new ServiceController();
    $serviceController->delete($id);
    exit;
}

echo "<h1>404 - Página no encontrada</h1>";