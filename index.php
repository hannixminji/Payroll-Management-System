<?php

require_once 'includes/session.php';

// Mano mano muna hanggang wala pang login page
$_SESSION['user_logged_in'] = true;
$_SESSION['user_access_role'] = 'admin';
$_SESSION['user_last_activity'] = time();
