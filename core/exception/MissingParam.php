<?php

namespace app\core\exception;

class MissingParam extends \Exception
{
    protected $message = 'There are missing parameters';
}