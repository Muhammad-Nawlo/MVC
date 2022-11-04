<?php

namespace app\core\exception;

class ValidationMaxException extends \Exception
{
    public function __construct(string $attribute, int $max)
    {
        $this->message = "The $attribute should not be greater than $max";
    }

}