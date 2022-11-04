<?php

namespace app\migrations;

use app\core\DB\DB;

class m0001_create_user_table
{
    public function up()
    {
        $pdo = DB::$pdo;
        $sql = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                is_admin TINYINT DEFAULT 0
            )  ENGINE=INNODB;";
        $pdo->exec($sql);
    }

    public function down()
    {
        $pdo = DB::$pdo;
        $pdo->exec('DROP TABLE users');
    }
}