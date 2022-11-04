<?php

namespace app\core\migrations;

use app\core\DB\DB;
use PDO;

class MigrationHelper
{
    public static function create_migration_table()
    {
        DB::$pdo->exec("Create table if not exists migrations (
                                    id int AUTO_INCREMENT PRIMARY KEY,
                                    migration VARCHAR(255),
                                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                                ) ENGINE=INNODB;"
        );
    }

    public static function get_applied_migrations()
    {
        $statement = DB::$pdo->prepare('SELECT migration FROM migrations');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    private static function to_applying_migrations()
    {
        $migrations = scandir($_ENV['ROOT_DIR'] . 'migrations');
        return array_diff($migrations, array_merge(self::get_applied_migrations(), ['.', '..']));
    }

    public static function applying_migrations()
    {
        $newAppliedMigrations = [];
        self::create_migration_table();
        $migrations = MigrationHelper::to_applying_migrations();
        if (empty($migrations)) {
            echo "All migrations are applied";
            exit;
        }
        foreach ($migrations as $migration) {
            include_once $_ENV['ROOT_DIR'] . 'migrations/' . $migration;
            $className = 'app\\migrations\\' . pathinfo($migration, PATHINFO_FILENAME);
            $className = new $className();
            echo "Applying migration $migration" . PHP_EOL;
            $className->up();
            echo "Migration applied $migration" . PHP_EOL;
            $newAppliedMigrations[] = $migration;
        }
        self::save_applied_migrations($newAppliedMigrations);

    }

    private static function save_applied_migrations(array $migrations)
    {
        $migrations = array_map(fn($m) => "('$m')", $migrations);
        $migrations = implode(',', $migrations);
        $statement = DB::$pdo->prepare("INSERT INTO migrations (migration) values $migrations");
        $statement->execute();
    }

}