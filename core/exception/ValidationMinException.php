<?php

namespace app\core\exception;

class ValidationMinException extends \Exception
{
    public function __construct(string $attribute, int $min)
    {
        $this->message = "The $attribute should not be less than $min";
    }

}