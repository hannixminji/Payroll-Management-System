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
        'DB_DATABASE',
    ])->notEmpty();

} catch (InvalidPathException $exception) {
    error_log('Dotenv Error: Invalid path encountered while loading environment variables. ' .
        'Exception Message: ' . $exception->getMessage());
} catch (ValidationException $exception) {
    error_log('Dotenv Error: Validation failed for required environment variables. ' .
        'Exception Message: ' . $exception->getMessage());
}

return [
    'connections' => [
        'mysql' => [
            'driver'   => 'mysql',
            'host'     => Helper::env('DB_HOST'    , '127.0.0.1'),
            'port'     => Helper::env('DB_PORT'    , '3306'     ),
            'database' => Helper::env('DB_DATABASE'                      ),
            'username' => Helper::env('DB_USERNAME', 'root'     ),
            'password' => Helper::env('DB_PASSWORD', ''         ),
            'charset'  => Helper::env('DB_CHARSET' , 'utf8mb4'  ),
        ],
    ],
];
