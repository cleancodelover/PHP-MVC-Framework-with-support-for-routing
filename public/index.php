<?php

use app\core\Application;

use app\controllers\HomeController;

use app\controllers\AuthController;

use app\controllers\ApiAuthController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

//API routes for external connection
$app->router->post('/api/login', [ApiAuthController::class, 'login']);

$app->router->post('/api/register', [ApiAuthController::class, 'register']);

$app->router->get('/api/logout', [ApiAuthController::class, 'logout']);

//Routes tested with views
$app->router->get('/', [HomeController::class, 'home']);

$app->router->get('/contact', [HomeController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);

$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);

$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->run();
