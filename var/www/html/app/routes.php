<?php
require __DIR__ . '/Controllers/HomeController.php';
require __DIR__ . '/Controllers/AboutController.php';

function registerRoutes($router) {
    $router->get('/', [HomeController::class, 'index']);
    $router->get('/about', [AboutController::class, 'index']);
}
