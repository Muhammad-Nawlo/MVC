<?php

namespace app\core\exception;

class RouteNotFound extends \Exception
{
    protected $message = 'Route not found';
}