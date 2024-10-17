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
}
