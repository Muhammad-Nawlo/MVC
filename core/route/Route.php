<?php

namespace app\core\route;

use app\core\container\Container;
use app\core\exception\ClassNotFound;
use app\core\exception\MethodNotFound;
use app\core\exception\RouteNotFound;
use app\core\request\Request;

class Route
{
    private static Route $instance;
    private static array $routing = [];
    private static Container $container;
    private static Request $request;

    private function __construct()
    {
    }

    public static function getInstance(): Route
    {
        if (!isset(self::$instance)) {
            self::$container = Container::getInstance();
            self::$request = Request::getInstance();
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function get(string $path, array|callable|string $action)
    {
        self::$routing['GET'][$path] = $action;
    }

    public static function post(string $path, array|callable|string $action)
    {
        self::$routing['POST'][$path] = $action;
    }


    public static function resolve()
    {
        $route = self::$request->path();
        $method = self::$request->method();
        if (!isset(self::$routing[$method][$route])) {
            throw new RouteNotFound();
        }
        $router = self::$routing[$method][$route];
        if (is_callable($router)) {
            return call_user_func($router, self::$request);
        }
        if (is_array($router)) {
            $className = $router[0];
            $method = $router[1];
            if (!class_exists($className)) {
                throw new ClassNotFound();
            }
            $className = new $className();
            if (!method_exists($className, $method)) {
                throw new MethodNotFound();
            }
            return call_user_func([$className, $method], self::$request);
        }


    }
}