<?php

namespace app\core\container;

use app\core\exception\ClassNotFound;
use app\core\exception\ContainerException;
use Psr\Container\ContainerInterface;
use ReflectionClass;

class Container implements ContainerInterface
{
    private static Container $instance;

    private function __construct()
    {
    }

    /**
     * @return Container
     */
    public static function getInstance(): Container
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private array $entries = [];

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new ClassNotFound();
        }
        $entry = $this->entries[$id];
        return $entry($this);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id)
    {
        $reflectionClass = new ReflectionClass($id);
        if (!$reflectionClass->isInstantiable()) {
            throw   new ContainerException();
        }
        $constructor = $reflectionClass->getConstructor();
        if (!$constructor) {
            return new $id;
        }
        $params = $constructor->getParameters();
        if (!$params) {
            return new $id;
        }
        $dependencies = array_map(function (\ReflectionParameter $p) {
            $name = $p->getName();
            $type = $p->getType();
            if (!$type) {
                throw new ContainerException();
            }
            if ($type instanceof \ReflectionUnionType) {
                throw new ContainerException();
            }
            if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }
            throw new ContainerException();
        }, $params);
        return $reflectionClass->newInstanceArgs($dependencies);
    }
}