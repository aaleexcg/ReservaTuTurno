<?php

require_once __DIR__ . "/../app/Controllers/UsuarioController.php";
require_once __DIR__ . "/../app/Controllers/ServiceController.php";
require_once __DIR__ . "/../app/Controllers/NegocioController.php";
require_once __DIR__ . "/../app/Controllers/ReservaController.php";
require_once __DIR__ . '/../config/auth.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$controller = new UsuarioController();
// si no hay negocio seleccionado
if (!isset($_SESSION['negocio_id']) && 
    $uri !== "/ProyectoFinal/public/negocios" &&
    strpos($uri, "/ProyectoFinal/public/negocios/seleccionar") === false &&
    $uri !== "/ProyectoFinal/public/login" &&
    $uri !== "/ProyectoFinal/public/register") {

    header("Location: /ProyectoFinal/public/negocios");
    exit;
}

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

// Mostrar negocios
if ($uri === "/ProyectoFinal/public/negocios" && $method === "GET") {
    $controller = new NegocioController();
    $controller->index();
    exit;
}

// Seleccionar negocio
if (strpos($uri, "/ProyectoFinal/public/negocios/seleccionar/") === 0) {
    $id = basename($uri);
    $controller = new NegocioController();
    $controller->seleccionar($id);
    exit;
}

// Crear reserva
/*if (strpos($uri, "/ProyectoFinal/public/reservas/crear") === 0) {
    $controller = new ReservaController();
    $controller->crear();
    exit;
}*/

// Guardar reserva
if ($uri === "/ProyectoFinal/public/reservas/guardar" && $method === "POST") {
    $controller = new ReservaController();
    $controller->guardar();
    exit;
}
// Cancelar reserva
if (strpos($uri, "/ProyectoFinal/public/reservas/cancelar/") === 0) {

    // Extraer solo el número final
    $partes = explode("/", $uri);
    $id = end($partes);

    // Asegurar que es un número
    if (is_numeric($id)) {
        $controller = new ReservaController();
        $controller->cancelar((int)$id);
    }

    exit;
}

// Listar reservas
if ($uri === "/ProyectoFinal/public/reservas" || 
    strpos($uri, "/ProyectoFinal/public/reservas?") === 0) {

    $controller = new ReservaController();
    $controller->index();
    exit;
}




// Mostrar formulario cambiar nombre
if ($uri === "/ProyectoFinal/public/usuario/cambiarNombre" && $method === "GET") {
    $controller = new UsuarioController();
    $controller->cambiarNombreForm();
    exit;
}

// Guardar nuevo nombre
if ($uri === "/ProyectoFinal/public/usuario/cambiarNombre" && $method === "POST") {
    $controller = new UsuarioController();
    $controller->cambiarNombre();
    exit;
}

// Calendario admin
if ($uri === "/ProyectoFinal/public/admin/calendario" && $method === "GET") {
    requireAdmin();
    $controller = new ReservaController();
    $controller->calendarioAdmin();
    exit;
}

// API JSON reservas
if (strpos($uri, "/ProyectoFinal/public/admin/reservas-json") === 0 && $method === "GET") {
    requireAdmin();
    $controller = new ReservaController();
    header("Content-Type: application/json");
    echo json_encode($controller->reservasJson());
    exit;
}


echo "<h1>404 - Página no encontrada</h1>";