<?php
require_once 'SessionManager.php';
SessionManager::start();
SessionManager::destroy();
header("Location: login.php");
exit();
?>
