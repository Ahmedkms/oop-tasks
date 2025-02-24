<?php
require_once 'SessionManager.php';
SessionManager::start();

if (!SessionManager::has('user')) {
    header("Location: login.php");
    exit();
}

$user = SessionManager::get('user');
?>

<h2>مرحبًا، <?php echo htmlspecialchars($user); ?> </h2>
<a href="logout.php">تسجيل الخروج</a>
