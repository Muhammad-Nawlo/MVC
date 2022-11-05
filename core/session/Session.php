<?php

namespace app\core\session;
class Session
{


    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    const FLASH = 'FLASH_MESSAGES';
    const FLASH_ERROR = 'error';
    const FLASH_WARNING = 'warning';
    const FLASH_INFO = 'info';
    const FLASH_SUCCESS = 'success';


    private static function create_flash_message(string $name, string $message, string $type): void
    {
        if (isset($_SESSION[self::FLASH][$name])) {
            unset($_SESSION[self::FLASH][$name]);
        }
        $_SESSION[self::FLASH][$name] = ['message' => $message, 'type' => $type];
    }

    private static function format_flash_message(array $flash_message): string
    {
        return sprintf('<div class="alert alert-%s" style="position: absolute;bottom: 15px;z-index: 2;right: 15px;">%s</div>',
            $flash_message['type'],
            $flash_message['message']
        );
    }


    private static function display_flash_message(string $name): void
    {
        if (!isset($_SESSION[self::FLASH][$name])) {
            return;
        }
        $flash_message = $_SESSION[self::FLASH][$name];
        unset($_SESSION[self::FLASH][$name]);
        echo self::format_flash_message($flash_message);
    }


    private static function display_all_flash_messages(): void
    {
        if (!isset($_SESSION[self::FLASH])) {
            return;
        }
        $flash_messages = $_SESSION[self::FLASH];
        unset($_SESSION[self::FLASH]);
        foreach ($flash_messages as $flash_message) {
            echo self::format_flash_message($flash_message);
        }
    }

    static function flash(string $name = '', string $message = '', string $type = ''): void
    {
        if ($name !== '' && $message !== '' && $type !== '') {
            self::create_flash_message($name, $message, $type);
        } elseif ($name !== '' && $message === '' && $type === '') {
            self::display_flash_message($name);
        } elseif ($name === '' && $message === '' && $type === '') {
            self::display_all_flash_messages();
        }
    }

}