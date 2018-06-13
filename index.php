<?php

require_once './config/config.php';

session_start();

require_once './router.php';
require_once './controllers/main_controller.php';

$router = new Router();

$router->register('GET', '/', 'MainController::index');

$router->serve();
