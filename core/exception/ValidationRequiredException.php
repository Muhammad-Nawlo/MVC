<?php

namespace app\core\exception;

use app\core\validation\Validation;

class ValidationRequiredException extends \Exception
{
    public function __construct($attribute)
    {
        $this->message = "The $attribute is " . Validation::REQUIRED->validation();
    }

}