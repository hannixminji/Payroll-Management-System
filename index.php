<?php

session_start();

$_SESSION['user_logged_in'] = false;
$_SESSION['user_access_role'] = 'admin';
$_SESSION['user_last_activity'] = time();
