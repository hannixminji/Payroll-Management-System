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

    public static function validateCsrfToken(string $formName, string $token): bool {
        if (isset($_SESSION['csrf_tokens'][$formName]) && hash_equals($_SESSION['csrf_tokens'][$formName], $token)) {
            return true;
        }
        return false;
    }
}
