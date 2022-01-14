<?php
require_once('../frontend/include.php');

session_start_once();

if (!isset($_SESSION['user_id'])) {
    if (!endsWith($_SERVER['SCRIPT_FILENAME'], 'login.php')) {
        header('Location: /backend/login.php');
        exit();
    }
} 