<?php

namespace app\core\DB;

use app\core\migrations\MigrationHelper;
use PDO;

class DB
{
    private static DB $instance;
    public static PDO $pdo;

    private function __construct()
    {
        self::$pdo = self::getConnection();
    }


    public static function getInstance(): DB
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private static function getConnection(): PDO
    {
        $dsn = $_ENV['DB_CONNECTION'] . ":host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_DATABASE'];
        self::$pdo = new \PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$pdo;
    }


}