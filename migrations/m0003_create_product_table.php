<?php

namespace app\migrations;

use app\core\DB\DB;

class m0003_create_product_table
{
    public function up()
    {
        $db = DB::getInstance();
        $db::$pdo->exec("CREATE TABLE if not exists products (
                        id int AUTO_INCREMENT PRIMARY KEY ,
                        brand varchar(255),
                        name varchar (255),
                        price float,
                        discount_price float,
                        img varchar(255),
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        views BIGINT , 
                        rating float ,
                        ram varchar(255),
                        color varchar(255),
                        storage varchar(255)
            ) ENGINE=INNODB;");

    }

    public function down()
    {
        $db = DB::getInstance();
        $db::$pdo->exec("DROP TABLE products");
    }
}