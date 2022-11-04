<?php

namespace app\core\validation;

enum Validation: string
{
    case REQUIRED = 'required';
    case EMAIL = 'email';
    case MIN = 'min';
    case MAX = 'max';

    public function validation(): string
    {
        return match ($this) {
            self::REQUIRED => 'Required',
            self::EMAIL => 'Email',
            self::MIN => 'Min',
            self::MAX => 'Max'
        };
    }
}