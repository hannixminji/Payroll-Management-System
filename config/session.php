<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use Dotenv\Exception\ValidationException;
use App\Helpers\Helper;

try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $dotenv->required([
        'SESSION_COOKIE_LIFETIME',
        'SESSION_COOKIE_SECURE'  ,
        'SESSION_COOKIE_SAMESITE',
    ])->notEmpty();

} catch (InvalidPathException $exception) {
    error_log('Dotenv Error: Invalid path encountered while loading environment variables. ' .
              'Exception Message: ' . $exception->getMessage());
} catch (ValidationException $exception) {
    error_log('Dotenv Error: Validation failed for required environment variables. ' .
              'Exception Message: ' . $exception->getMessage());
}

return [
    'cookies' => [
        'session.cookie_lifetime' => Helper::env('SESSION_COOKIE_LIFETIME', '0'     ),
        'session.cookie_secure'   => Helper::env('SESSION_COOKIE_SECURE'  , '0'     ),
        'session.cookie_httponly' => Helper::env('SESSION_COOKIE_HTTPONLY', '1'     ),
        'session.cookie_samesite' => Helper::env('SESSION_COOKIE_SAMESITE', 'Lax'   ),
        'session.use_strict_mode' => Helper::env('SESSION_USE_STRICT_MODE', '1'     ),
        'session.sid_length'      => Helper::env('SESSION_SID_LENGTH'     , '48'    ),
        'session.hash_function'   => Helper::env('SESSION_HASH_FUNCTION'  , 'sha256'),
    ],
];
