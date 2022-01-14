<?php
require_once('../frontend/include.php');

session_start_once();

if (!isset($_SESSION['user_id'])) {
    if (!endsWith($_SERVER['SCRIPT_FILENAME'], 'login.php')) {
        header('Location: /backend/login.php');
        exit();
    }
} 

if (isset($_SESSION["isadmin"]) && $_SESSION["isadmin"] == 0) {
    header('Location: ../index.php');
    exit();
}