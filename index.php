<?php

require_once './config/config.php';
require_once './config/utils.php';
require_once './config/conn.php';

require_once './models/product.php';
require_once './models/option.php';
require_once './models/user.php';

require_once './repos/product_repo.php';
require_once './repos/option_repo.php';
require_once './repos/user_repo.php';

session_start();

require_once './router.php';

require_once './controllers/base_controller.php';

BaseController::ensureSession('user');
BaseController::ensureSession('cart');

require_once './controllers/cart_controller.php';

require_once './controllers/main_controller.php';
require_once './controllers/user_controller.php';
require_once './controllers/admin/product_controller.php';
require_once './controllers/admin/option_controller.php';

$router = new Router();

$router->register('GET', '/users/login', 'UserController::loginForm');
$router->register('POST', '/users/login', 'UserController::login');
$router->register('GET', '/users/register', 'UserController::registerForm');
$router->register('POST', '/users/register', 'UserController::register');
$router->register('POST', '/users/logout', 'UserController::logout');

$router->register('GET', '/cart', 'CartController::index');
$router->register('POST', '/cart/add', 'CartController::add');
$router->register('POST', '/cart/substract', 'CartController::substract');
$router->register('POST', '/cart/destroy', 'CartController::destroy');

$router->register('GET', '/', 'MainController::index');
$router->register('GET', '/admin/products/create', 'ProductController::createForm');
$router->register('POST', '/admin/products', 'ProductController::create');

$router->register('GET', '/admin/options/create', 'OptionController::createForm');
$router->register('POST', '/admin/options', 'OptionController::create');

$router->serve();
