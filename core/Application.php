<?php

namespace app\core;

use app\core\container\Container;
use app\core\model\Model;
use app\core\route\Route;
use app\core\session\Session;

session_start();

class Application
{
    private static Application $instance;
    private static array $config;
    private static Container $container;

    private function __construct($config)
    {
        self::$config = $config;
    }

    public static function getInstance(array $config): Application
    {
        if (!isset(self::$instance)) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public static function config(string $config)
    {
        return self::$config[$config] ?? null;
    }

    public function run()
    {
        echo Route::resolve();
    }

    public static function login(Model $user)
    {
        Session::set('user', $user);
    }

    public static function logout()
    {
        Session::remove('user');
    }

    static function user(): Model|null
    {
        return Session::get('user') ?? null;
    }

    public static function isGuest()
    {
        return Session::get('user') ===null;
    }

}