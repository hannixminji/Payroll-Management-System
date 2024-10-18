<?php

$sessionConfig = require_once __DIR__ . '/../config/session.php';

$cookiesConfig = $sessionConfig['cookies'];

foreach ($cookiesConfig as $option => $value) {
    ini_set($option, $value);
}

session_start();
