<?php

require_once('include.php');

unset($_SESSION['user_id']);
unset($_SESSION["username"]);
unset($_SESSION["isadmin"]);
session_destroy();

header('Location: ../index.php');

?>