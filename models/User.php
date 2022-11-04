<?php

namespace app\models;

use app\core\model\Model;

class User extends Model
{
    public string|null $email = null;
    public string|null $password = null;
    public string|null $firstname = null;
    public string|null $lastname = null;
    public int|null $is_admin = null;

    protected static function tableName(): string
    {
        return 'users';
    }

    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        return parent::save();
    }

    protected function attributes(): array
    {
        return [
            'email',
            'password',
            'firstname',
            'lastname',
            'is_admin',
        ];
    }
}