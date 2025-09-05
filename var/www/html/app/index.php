<?php
require __DIR__ . '/core/Router.php';
require __DIR__ . '/routes.php';

// Initialize the router
$router = new Router();

// Load routes
registerRoutes($router);

// Dispatch based on URL
$router->dispatch($_SERVER['REQUEST_URI']);
