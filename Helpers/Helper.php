<?php

namespace App\Helpers;

final class Helper
{
    public static function env(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }

    public static function isNull(mixed $value): bool
    {
        return $value === null;
    }

    public static function generateCsrfToken(string $formName): string {
        if (empty($_SESSION['csrf_tokens'][$formName])) {
            $_SESSION['csrf_tokens'][$formName] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_tokens'][$formName];
    }
}
