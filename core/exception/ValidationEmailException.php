<?php

namespace app\core\exception;

use app\core\validation\Validation;

class ValidationEmailException extends \Exception
{
    public function __construct($attribute)
    {
        $this->message = "The $attribute should be a valid " . Validation::EMAIL->validation();
    }

}