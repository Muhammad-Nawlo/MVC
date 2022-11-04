<?php

namespace app\migrations;

use app\core\DB\DB;

class m0002_add_password_column
{
    public function up()
    {
        $pdo = DB::$pdo;
        $sql = "ALTER TABLE users ADD password varchar(255);";
        $pdo->exec($sql);
    }

    public function down()
    {
        $pdo = DB::$pdo;
        $pdo->exec('ALTER TABLE users DROP COLUMN password varchar(255)');
    }
}
