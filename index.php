<?php

session_start();

// Kunwari eto muna yung user na nag logged in
$_SESSION['user_logged_in'] = false;
$_SESSION['user_access_role'] = 'admin';
$_SESSION['user_last_activity'] = time();
