<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use app\core\DB\DB;
use app\core\migrations\MigrationHelper;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();
$db = DB::getInstance();
$action = $argv;

if (isset($action[1]) && $action[1] === '--drop') {
    //@todo drop all tables
    echo 'drop all tables';
//    MigrationHelper::droping_migrations();
} else {
    MigrationHelper::applying_migrations();
}

