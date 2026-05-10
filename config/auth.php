<?php

function isLogged() {
    return isset($_SESSION['user']);
}

function isAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'admin';
}

function requireLogin() {
    if (!isLogged()) {
        header("Location: /ProyectoFinal/public/login");
        exit;
    }
}

function requireAdmin() {
    if (!isAdmin()) {
        header("Location: /ProyectoFinal/public");
        exit;
    }
}
