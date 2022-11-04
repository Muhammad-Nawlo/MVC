<?php

namespace app\core\response;

class Response
{
    private static Response $instance;

    private function __construct()
    {
    }

    public static function getInstance(): Response
    {
        if (!isset(self::$instance)) {
            self::$instance = new Response();
        }
        return self::$instance;
    }

    public static function redirect(string $url)
    {
        header("Location:$url");
    }
}