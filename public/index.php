<?php
require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = include_once $_ENV['ROOT_DIR'] . 'core/config/app.php';

use app\core\Application;
use app\core\DB\DB;
use app\core\route\Route;

$db = DB::getInstance();
$route = Route::getInstance();
$app = Application::getInstance($config);


require_once __DIR__ . "/../route/route.php";
$app->run();