<?php

namespace app\core\request;

use app\core\validation\Validation;

class Request
{
    private static Request $instance;

    private function __construct()
    {
    }

    public static function getInstance(): Request
    {
        if (!isset(self::$instance)) {
            self::$instance = new Request();
        }
        return self::$instance;
    }

    public function path(): string
    {
        $request = explode('?', $_SERVER['REQUEST_URI']);
        return $request[0];
    }

    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function body(): array
    {
        $body = [];
        $method = $this->method();
        switch ($method) {
            case    "GET":
                foreach ($_GET as $key => $val)
                    $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                break;
            case "POST":
                foreach ($_POST as $key => $val)
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                break;
        }
        return $body;
    }

    public function validate(array $data): array
    {
        $body = $this->body();
        $errors = [];
        foreach ($data as $attribute => $rules) {
            $valueOfAttr = $body[$attribute] ?? null;
            $rules = explode('|', $rules);
            foreach ($rules as $rule) {
                $min = $max = null;
                if (str_contains($rule, 'min')) {
                    $temp = explode(':', $rule);
                    $rule = $temp[0];
                    $min = $temp[1];
                }
                if (str_contains($rule, 'max')) {
                    $temp = explode(':', $rule);
                    $rule = $temp[0];
                    $max = $temp[1];
                }
                switch ($rule) {
                    case  Validation::REQUIRED->value:
                        if ($valueOfAttr === null) {
                            $errors[$attribute][] = 'This field is required';
//                            throw new ValidationRequiredException($attribute);
                        }
                        break;
                    case Validation::EMAIL->value:
                        if (!filter_var($valueOfAttr, FILTER_VALIDATE_EMAIL)) {
                            $errors[$attribute][] = 'This field should be a valid email';
                            //                            throw new ValidationEmailException($attribute);
                        }
                        break;
                    case Validation::MIN->value:
                        if (strlen($valueOfAttr) < $min) {
                            $errors[$attribute][] = 'This field should not be less than ' . $min;
//                            throw new ValidationMinException($attribute, $min);
                        }
                        break;
                    case Validation::MAX->value:
                        if (strlen($valueOfAttr) > $max) {
                            $errors[$attribute][] = 'This field should not be greater than ' . $max;
//                            throw new ValidationMaxException($attribute, $max);
                        }
                        break;
                }
            }
        }
        return [$errors, $body];
    }

}