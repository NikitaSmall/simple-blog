<?php

require_once './config/config.php';
require_once './config/utils.php';
require_once './config/conn.php';

require_once './models/product.php';
require_once './models/option.php';

require_once './repos/product_repo.php';
require_once './repos/option_repo.php';

session_start();

require_once './router.php';

require_once './controllers/base_controller.php';

require_once './controllers/main_controller.php';
require_once './controllers/admin/product_controller.php';
require_once './controllers/admin/option_controller.php';

$router = new Router();

$router->register('GET', '/', 'MainController::index');
$router->register('GET', '/admin/products/create', 'ProductController::createForm');
$router->register('POST', '/admin/products', 'ProductController::create');

$router->register('GET', '/admin/options/create', 'OptionController::createForm');
$router->register('POST', '/admin/options', 'OptionController::create');

$router->serve();
