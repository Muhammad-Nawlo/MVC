<?php

namespace app\core\view;

use app\core\Application;
use app\core\exception\DirectoryNotFound;
use app\core\exception\ViewNotFound;

class View
{
    private static View $instance;
    private string $view_path;

    private function __construct()
    {
        $this->view_path = Application::config('view_path');
    }

    public static function getInstance(): View
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function render(string $view, array $params = [], string|null $withLayout = 'main'): string
    {
        $view = $this->getView($view, $params);
        $layout = null;
        if ($withLayout !== null) {
            $layout = $this->getLayout($withLayout);
        }
        if ($withLayout !== null) {
            return str_replace('{{content}}', $view, $layout);
        } else {
            return $view;
        }
    }

    private function getView($view, $params): bool|string
    {
        foreach ($params as $key => $value)
            $$key = $value;

        [$dirPath, $path] = $this->getPath($view);
        ob_start();
        include_once $dirPath === null ? $this->view_path . $path : $this->view_path . $dirPath . '/' . $path;
        return ob_get_clean();
    }

    private function getLayout(string $layout): bool|string
    {
        [$dirPath, $path] = $this->getPath('layouts/' . $layout);
        ob_start();
        include_once $dirPath === null ? $this->view_path . $path : $this->view_path . $dirPath . '/' . $path;
        return ob_get_clean();
    }

    private function getPath(string $view): array
    {
        $path = null;
        $dirPath = null;
        if (str_contains($view, '.')) {
            $temp = explode('.', $view);
            $dirPath = $temp[0];
            $path = $temp[1] . '.php';
        } elseif (str_contains($view, '/')) {
            $temp = explode('/', $view);
            $dirPath = $temp[0];
            $path = $temp[1] . '.php';
        } else {
            $path = $view . '.php';
        }
        if ($dirPath !== null) {
            if (!is_dir($this->view_path . $dirPath)) {
                throw new DirectoryNotFound();
            }
            if (!file_exists($this->view_path . $dirPath . '/' . $path)) {
                throw new ViewNotFound();
            }
        } else {
            if (!file_exists($this->view_path . $path)) {
                throw new ViewNotFound();
            }
        }
        return [$dirPath, $path];
    }

}