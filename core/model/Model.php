<?php

namespace app\core\model;

use app\core\DB\DB;

abstract class Model
{
    public function __construct()
    {
    }

    protected abstract static function tableName(): string;

    protected abstract function attributes(): array;

    public function load(array $data)
    {
        foreach ($this->attributes() as $attribute) {
            $this->{$attribute} = $data[$attribute] === '' ? null : $data[$attribute];;
        }
    }

    public function save(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attribute) => ":$attribute", $attributes);
        $statement = DB::$pdo->prepare("INSERT INTO $tableName
                                (" . implode(',', $attributes) . ")
                            VALUES 
                                (" . implode(',', $params) . ");");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        return $statement->execute();
    }

    public function update($id): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attribute) => "$attribute=:$attribute ", $attributes);
        $statement = DB::$pdo->prepare("UPDATE $tableName SET
                                " . implode(', ', $params) . "
                                WHERE id=$id;");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        return $statement->execute();
    }

    public static function findOne(array $conditions)
    {
        $tableName = static::tableName();
        $attributes = array_keys($conditions);
        $sql = implode(' AND ', array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = DB::$pdo->prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($conditions as $key => $val) {
            $statement->bindValue(":$key", $val);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function delete(array $conditions)
    {
        $tableName = static::tableName();
        $attributes = array_keys($conditions);
        $sql = implode(' AND ', array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = DB::$pdo->prepare("DELETE FROM $tableName WHERE $sql");
        foreach ($conditions as $key => $val) {
            $statement->bindValue(":$key", $val);
        }
        $statement->execute();
    }

    public static function findAll()
    {
        $tableName = static::tableName();
        $statement = DB::$pdo->prepare("SELECT * FROM $tableName order by created_at desc ");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}