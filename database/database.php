<?php

$databaseConfig = require_once __DIR__ . '/../config/database.php';

$connectionConfig = $databaseConfig['connections']['mysql'];

$dataSourceName = sprintf(
    '%s:host=%s;port=%d;dbname=%s;charset=%s',
    $connectionConfig['driver'  ],
    $connectionConfig['host'    ],
    $connectionConfig['port'    ],
    $connectionConfig['database'],
    $connectionConfig['charset' ]
);

$username = $connectionConfig['username'];
$password = $connectionConfig['password'];

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO(
        $dataSourceName,
        $username,
        $password,
        $options
    );
} catch (PDOException $exception) {
    error_log('Database Connection Error: Unable to connect to the database. ' .
        'Exception Message: ' . $exception->getMessage());
}
